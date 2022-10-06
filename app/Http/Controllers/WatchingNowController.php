<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Watching_now;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies_Series;
class WatchingNowController extends Controller
{
public function index(){
    
    $watchingNows = Watching_now::with('movie__series')->where('user_id',auth()->user()->id)->get();
    
     return $watchingNows;
}


    public function store($id)
 {
    $watchingNow=Watching_now::where('movie__series_id',$id)->where('user_id',Auth::user()->id)->first();
    if(!$watchingNow)
    {
  $watchingNow=new Watching_now();
  $watchingNow->value=1;
  $watchingNow->movie__series_id=$id;
  $watchingNow->user_id=auth()->user()->id;
  $watchingNow->save();
  $show=Movies_Series::find($id);
  $show->save();
    }
  if (isset($show)) {
    
    return $show ;
    }
    else
  {
        $show = Movies_Series::find($id);
  if (isset($show)) 
    {
        
        $watchingNow->delete();
        
    } 
  }
 }
}
