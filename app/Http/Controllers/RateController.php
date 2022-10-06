<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies_Series;

class RateController extends Controller
{
    
    public function store(Request $request , $id)
    {

        $rate=Rate::where('movie__series_id',$id)->where('user_id',Auth::user()->id)->first();
        $rate = new Rate();
		$rate->rating = $request->rating;
		$rate->user_id = auth()->user()->id;
		$rate->movie__series_id = $id;

        $rate->save();
        $product=Movies_Series::find($id);
        $product->rate= Rate::where('movie__series_id',$id)->first()->avg('rating') ;
        $product->save();
        $response['data'] = $rate;
        $response['message'] = "Added Successfully";
        return  response()->json($response,200);
        
    }

}
