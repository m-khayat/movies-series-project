<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesMs;
use App\Models\Movies_Series;
use App\Models\Categories;
class CategoriesMsController extends Controller
{
    public function index($id)
    {
     $categories = CategoriesMs::with('category')->where('movie__series_id',$id)->get();
     $response['data'] = $categories;
     $response['message'] = "This is all categories";
     return  response()->json($response,200);
    }
    
    public function store(Request $request)
    {

      $request->validate([
         "movie__series_id"=>"required",
         "category_id"=>"required",

     ]);

        $category = new CategoriesMs();
        $category->movie__series_id = $request->movie__series_id;
        $category->category_id = $request->category_id;
        
        $category->save();
        $response['data'] = $category;
        $response['message'] = "Category Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $category = CategoriesMs::where('id' , $id)->first();
    if (isset($category))
    {
        if (isset($request->movie__series_id)){
        $category->movie__series_id = $request->movie__series_id;}

        if (isset($request->category_id)){
        $category->category_id = $request->category_id;}

        $category->save();
        $response['data'] = $category;
        $response['message'] = "Update Successfully ";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);

    }
    public function destroy($id)
    {
         $category = CategoriesMs::find($id);
  if (isset($category)) {
        $category->delete();
        $response['data'] = '';
        $response['message'] = "Category Deleted Successfully";
       return  response()->json($response,200);

    }
       $response['data'] = '';
       $response['message'] = "Error Not Found";
       return  response()->json($response,404); 
    
}  
}
