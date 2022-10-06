<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies_Series;
use Illuminate\Support\Facades\Auth;

class Movies_SeriesController extends Controller
{
    public function index()
    {
     $shows = Movies_Series::all();
     $response['data'] = $shows;
     $response['message'] = "This is all shows";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $show = Movies_Series::find($id);
    if (isset($show)) {
       $response['data'] = $show;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $show;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {
        $request->validate([
                "title"=>"required",
                "story"=>"required",
                "IMDB_link"=>"required",
                "release_date"=>"required|date",
                "language"=>"required",
                "runtime"=> "required",
                "director_id" => "required",
                "poster" => "required|image|mimes:jpg,jpeg,png,gif",
                "trailer" => "required|mimes:mp4",

            ]);


        $show = new Movies_Series();
        $show->title = $request->title;
        $show->story = $request->story;
        $show->IMDB_link = $request->IMDB_link;
        $show->release_date = $request->release_date;
        $show->runtime = $request->runtime;
        $show->language = $request->language;
        $show->director_id = $request->director_id;
        $show->user_id = Auth::user()->id;
        
        $poster = $request->file('poster');
        $poster_name = time().'.'.$poster->getClientOriginalExtension();
        $destinationpath = public_path('/upload/posters');
        $poster->move($destinationpath , $poster_name);
        $show->poster = $poster_name;


        $trailer = $request->file('trailer');
        $trailer_name = time().'.'.$trailer->getClientOriginalExtension();
        $destinationpath = public_path('/upload/trailers');
        $trailer->move($destinationpath , $trailer_name);
        $show->trailer = $trailer_name;


        $show->save();
        $response['data'] = $show;
        $response['message'] = "show Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
        $request->validate([
                
                "release_date"=>"date",
                "poster" => "image|mimes:jpg,jpeg,png,gif",
                "trailer" => "mimes:mp4",

            ]);

    $show = Movies_Series::where('id' , $id)->first();
    if (isset($show))
    {
        if (isset($request->title)){
        $show->title = $request->title;}

        if (isset($request->story)){
            $show->story = $request->story;}

        if (isset($request->IMDB_link)){
             $show->IMDB_link = $request->IMDB_link;}

        if (isset($request->release_date)){
                $show->release_date = $request->release_date;}
        
        if (isset($request->runtime)){
                $show->runtime = $request->runtime;}
        
        if (isset($request->language)){
                $show->language = $request->language;}

        if (isset($request->director_id)){
                $show->director_id = $request->director_id;}
             
        if (isset($request->poster)){
                $poster = $request->file('poster');
                $poster_name = time().'.'.$poster->getClientOriginalExtension();
                $destinationpath = public_path('/upload/posters');
                $poster->move($destinationpath , $poster_name);
                $show->poster = $poster_name;}

        if (isset($request->trailer)){
                $trailer = $request->file('trailer');
                $trailer_name = time().'.'.$trailer->getClientOriginalExtension();
                $destinationpath = public_path('/upload/trailers');
                $trailer->move($destinationpath , $trailer_name);
                $show->trailer = $trailer_name;}
                
        $show->save();
        $response['data'] = $show;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $show = Movies_Series::find($id);
  if (isset($show)) {
        $show->delete();
        $response['data'] = '';
        $response['message'] = "show Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
