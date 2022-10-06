<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directors;
use Illuminate\Support\Facades\Auth;
class DirectorsController extends Controller
{
    public function index()
    {
     $directors = Directors::all();
     $response['data'] = $directors;
     $response['message'] = "This is all directors";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $director = Directors::find($id);
    if (isset($director)) {
       $response['data'] = $director;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $director;
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

        $director = new Directors();
        $director->name = $request->name;
        $director->birth_date = $request->birth_date;
        $director->gender = $request->gender;
        $director->user_id = Auth::user()->id;
        
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationpath = public_path('/upload/images');
        $image->move($destinationpath , $name);
        $director->image = $name;

        $director->save();
        $response['data'] = $director;
        $response['message'] = "director Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {

      $request->validate([
         "birth_date"=>"date",
         "image" => "image|mimes:jpg,jpeg,png,gif",

     ]);

    $director = Directors::where('id' , $id)->first();
    if (isset($director))
    {
        if (isset($request->name)){
        $director->name = $request->name;}

        if (isset($request->birth_date)){
            $director->birth_date = $request->birth_date;}

        if (isset($request->gender)){
             $director->gender = $request->gender;}
             
         if (isset($request->image)){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationpath = public_path('/upload/images');
            $image->move($destinationpath , $name);
            $director->image = $name;}
                
        $director->save();
        $response['data'] = $director;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $director = Directors::find($id);
  if (isset($director)) {
        $director->delete();
        $response['data'] = '';
        $response['message'] = "director Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
