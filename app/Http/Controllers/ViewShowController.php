<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Views;
use Illuminate\Support\Facades\Auth;
use App\Models\Movies_Series;
use App\Models\User;
class ViewShowController extends Controller
{
    public function index($id)
    {
        $view = Views::where('movie__series_id', $id)->where('user_id', Auth::user()->id)->first();
        if (!$view) {
            $view = new Views();
            $view->movie__series_id = $id;
            $view->user_id = auth()->user()->id;
            $view->save();
            $show = Movies_Series::find($id);
            $show->count_view++;
            $show->save();
            return response()->json(['massage' => 'view added'], 200);
        } else {
            return response()->json(['massage' => 'already added'], 404);
        }
    }
}
