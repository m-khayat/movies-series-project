<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CastingCrew;
use App\Models\Movies_Series;
use App\Models\Actor;

class CastingCrewController extends Controller
{
    public function index($id)
    {
     $actors = CastingCrew::with('actor')->where('movie__series_id',$id)->get();
     $response['data'] = $actors;
     $response['message'] = "This is all casting crew";
     return  response()->json($response,200);
    }
    
    public function store(Request $request)
    {

      $request->validate([
         "movie__series_id"=>"required",
         "actor_id"=>"required",

     ]);

        $actor = new CastingCrew();
        $actor->movie__series_id = $request->movie__series_id;
        $actor->actor_id = $request->actor_id;
        
        $actor->save();
        $response['data'] = $actor;
        $response['message'] = "casting crew Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $actor = CastingCrew::where('id' , $id)->first();
    if (isset($actor))
    {
        if (isset($request->movie__series_id)){
        $actor->movie__series_id = $request->movie__series_id;}

        if (isset($request->actor_id)){
        $actor->actor_id = $request->actor_id;}

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
         $actor = CastingCrew::find($id);
  if (isset($actor)) {
        $actor->delete();
        $response['data'] = '';
        $response['message'] = "casting crew Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
} 
}
