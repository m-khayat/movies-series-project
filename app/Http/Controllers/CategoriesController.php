<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
class CategoriesController extends Controller
{
    public function index()
    {
     $categories = Categories::all();
     $response['data'] = $categories;
     $response['message'] = "This is all categories";
     return  response()->json($response,200);
    }
    public function show($id)
    {
    $category = Categories::find($id);
    if (isset($category)) {
       $response['data'] = $category;
       $response['message'] = "Success";
       return  response()->json($response,200);

    }
       $response['data'] = $category;
       $response['message'] = "Error Not Found";
       return  response()->json($response,404);
    
    }
    public function store(Request $request)
    {

      $request->validate([
         "name"=>"required",
     ]);

        $category = new Categories();
        $category->name = $request->name;
        $category->user_id = Auth::user()->id;
        
        $category->save();
        $response['data'] = $category;
        $response['message'] = "Category Created Successfully";
        return  response()->json($response,200);
        
    }
    public function update(Request $request , $id)
    {
    $category = Categories::where('id' , $id)->first();
    if (isset($category))
    {
        if (isset($request->name)){
        $category->name = $request->name;}
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
         $category = Categories::find($id);
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
