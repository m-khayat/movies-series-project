<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorites;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies_Series;
class FavoriteController extends Controller
{
public function index(){
    
    $favorites = Favorites::with('movie__series')->where('user_id',auth()->user()->id)->get();
    
     return $favorites;
}


    public function store($id)
 {
    $favorite=Favorites::where('movie__series_id',$id)->where('user_id',Auth::user()->id)->first();
    if(!$favorite)
    {
  $favorite=new Favorites();
  $favorite->value=1;
  $favorite->movie__series_id=$id;
  $favorite->user_id=auth()->user()->id;
  $favorite->save();
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
        
        $favorite->delete();
        
    } 
  }
 }
}
