<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class CommentShowController extends Controller
{
    public function index($id)
    {
     $comments = Comments::with('users')->where('movie__series_id',$id)->get();
     $response['data'] = $comments;
     $response['message'] = "This is all comments";
     return  response()->json($response,200);
    }
    public function store(Request $request)
    {

        $request->validate([
            "line"=>"required",
            "movie__series_id"=>"required",
   
        ]);
   
        $comment = new Comments();
		$comment->line = $request->line;
		$comment->user_id = Auth::user()->id;
		$comment->movie__series_id = $request->movie__series_id;

        $comment->save();
        $response['data'] = $comment;
        $response['message'] = "Added Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id){
    {
      
    $comment = Comments::where('id' , $id)->first();
    if (isset($comment))
    {
      if (isset($request->line)){
        $comment->line = $request->line;}
        
        $comment->save();
        $response['data'] = $comment;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }

    }

    public function destroy($id)
    {
         $comment = Comments::find($id);
  if (isset($comment)) {
        $comment->delete();
        $response['data'] = '';
        $response['message'] = "Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}
}
