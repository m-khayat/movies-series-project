<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    public function index()
    {
     $videos = Videos::all();
     $response['data'] = $videos;
     $response['message'] = "This is all categories";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $video = Videos::find($id);
    if (isset($video)) {
       $response['data'] = $video;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $video;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {

      $request->validate([

         "video" => "required|mimes:mp4",

     ]);

        $viideo = new Videos();
        $viideo->user_id = Auth::user()->id;
        
        $video = $request->file('video');
        $video_name = time().'.'.$video->getClientOriginalExtension();
        $destinationpath = public_path('/upload/videos');
        $video->move($destinationpath , $video_name);
        $viideo->video = $video_name;

        $viideo->save();
        $response['data'] = $viideo;
        $response['message'] = "video Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {

      $request->validate([

         "video" => "mimes:mp4",

     ]);

    $viideo = Videos::where('id' , $id)->first();
    if (isset($viideo))
    {
        if (isset($request->video)){
            $video = $request->file('video');
            $video_name = time().'.'.$video->getClientOriginalExtension();
            $destinationpath = public_path('/upload/videos');
            $video->move($destinationpath , $video_name);
            $viideo->video = $video_name;}
        $viideo->save();
        $response['data'] = $viideo;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $video = Videos::find($id);
  if (isset($video)) {
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
