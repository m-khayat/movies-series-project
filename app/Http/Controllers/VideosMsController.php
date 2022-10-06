<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos_ms;
use App\Models\Movies_Series;
use App\Models\videos;

class VideosMsController extends Controller
{
    public function index($id)
    {
     $videos = Videos_ms::with('movie__series','video')->where('movie__series_id',$id)->get();
     $response['data'] = $videos;
     $response['message'] = "This is all videos";
     return  response()->json($response,200);
    }
    
    public function store(Request $request)
    {
      $request->validate([
         "movie__series_id"=>"required",
         "video_id"=>"required",

     ]);
        $video = new Videos_ms();
        $video->movie__series_id = $request->movie__series_id;
        $video->video_id = $request->video_id;
        
        $video->save();
        $response['data'] = $video;
        $response['message'] = "video Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $video = Videos_ms::where('id' , $id)->first();
    if (isset($video))
    {
        if (isset($request->movie__series_id)){
        $video->movie__series_id = $request->movie__series_id;}

        if (isset($request->video_id)){
        $video->video_id = $request->video_id;}

        $video->save();
        $response['data'] = $video;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $video = Videos_ms::find($id);
  if (isset($category)) {
        $video->delete();
        $response['data'] = '';
        $response['message'] = "video Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
