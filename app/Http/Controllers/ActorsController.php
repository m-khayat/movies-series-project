<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use Illuminate\Support\Facades\Auth;
class ActorsController extends Controller
{
    public function index()
    {
     $actors = Actor::all();
     $response['data'] = $actors;
     $response['message'] = "This is all actors";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $actor = Actor::find($id);
    if (isset($actor)) {
       $response['data'] = $actor;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $actor;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {

      $request->validate([
         "name"=>"required",
         "birth_date"=>"required|date",
         "gender"=>"required",
         "image" => "required|image|mimes:jpg,jpeg,png,gif",

     ]);

        $actor = new Actor();
        $actor->name = $request->name;
        $actor->birth_date = $request->birth_date;
        $actor->gender = $request->gender;
        $actor->user_id = Auth::user()->id;
        
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('/upload/images');
        $image->move($destinationpath , $name);
        $actor->image = $name;

        $actor->save();
        $response['data'] = $actor;
        $response['message'] = "Actor Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {

      $request->validate([
         "birth_date"=>"date",
         "image" => "image|mimes:jpg,jpeg,png,gif",

     ]);

    $actor = Actor::where('id' , $id)->first();
    if (isset($actor))
    {
        if (isset($request->name)){
        $actor->name = $request->name;}

        if (isset($request->birth_date)){
            $actor->birth_date = $request->birth_date;}

        if (isset($request->gender)){
             $actor->gender = $request->gender;}
             
         if (isset($request->image)){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationpath = public_path('/upload/images');
            $image->move($destinationpath , $name);
            $actor->image = $name;}
                
        $actor->save();
        $response['data'] = $actor;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $actor = Actor::find($id);
  if (isset($actor)) {
        $actor->delete();
        $response['data'] = '';
        $response['message'] = "Actor Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
