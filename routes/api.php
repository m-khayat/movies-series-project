<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\DirectorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\Movies_SeriesController;
use App\Http\Controllers\CategoriesMsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WatchingNowController;
use App\Http\Controllers\ViewShowController;
use App\Http\Controllers\CommentShowController;
use App\Http\Controllers\VideosMsController;
use App\Http\Controllers\CastingCrewController;
use App\Http\Controllers\RateController;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


  // UsersController.Api

  Route::post("register", [UsersController::class, "register"]);
  Route::post("login", [UsersController::class, "login"]);

Route::group(["middleware"=> ["auth:api"]],function(){

      Route::get("profile", [UsersController::class, "profile"]);
      Route::post("logout", [UsersController::class, "logout"]);

});


 // SlidersController.Api
 Route::group(["middleware"=> ["auth:api"]],function(){
      Route::post("create_slider", [SlidersController::class, "store"]);
      Route::post("update_slider/{id}", [SlidersController::class, "update"]);
      Route::delete("delete_slider/{id}", [SlidersController::class, "destroy"]);
 });
      Route::get("list_sliders", [SlidersController::class, "index"]);
      Route::get("single_slider/{id}", [SlidersController::class, "show"]);

// AboutUsController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
      Route::post("create_aboutus", [AboutUsController::class, "store"]);
      Route::post("update_aboutus/{id}", [AboutUsController::class, "update"]);
      Route::delete("delete_aboutus/{id}", [AboutUsController::class, "destroy"]);
});
      Route::get("list_aboutuss", [AboutUsController::class, "index"]);
      Route::get("single_aboutus/{id}", [AboutUsController::class, "show"]);



      // ActorsController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_actor", [ActorsController::class, "store"]);
  Route::post("update_actor/{id}", [ActorsController::class, "update"]);
  Route::delete("delete_actor/{id}", [ActorsController::class, "destroy"]);
});
  Route::get("list_actors", [ActorsController::class, "index"]);
  Route::get("single_actor/{id}", [ActorsController::class, "show"]);



  // DirectorsController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_director", [DirectorsController::class, "store"]);
  Route::post("update_director/{id}", [DirectorsController::class, "update"]);
  Route::delete("delete_director/{id}", [DirectorsController::class, "destroy"]);
});
  Route::get("list_directors", [DirectorsController::class, "index"]);
  Route::get("single_director/{id}", [DirectorsController::class, "show"]);



  // CategoriesController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_caterory", [CategoriesController::class, "store"]);
  Route::post("update_category/{id}", [CategoriesController::class, "update"]);
  Route::delete("delete_category/{id}", [CategoriesController::class, "destroy"]);
});
  Route::get("list_categories", [CategoriesController::class, "index"]);
  Route::get("single_category/{id}", [CategoriesController::class, "show"]);



  // VideosController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_video", [VideosController::class, "store"]);
  Route::post("update_video/{id}", [VideosController::class, "update"]);
  Route::delete("delete_video/{id}", [VideosController::class, "destroy"]);
});
  Route::get("list_videos", [VideosController::class, "index"]);
  Route::get("single_video/{id}", [VideosController::class, "show"]);


  // Movies_SeriesController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_show", [Movies_SeriesController::class, "store"]);
  Route::post("update_show/{id}", [Movies_SeriesController::class, "update"]);
  Route::delete("delete_show/{id}", [Movies_SeriesController::class, "destroy"]);
});
  Route::get("list_shows", [Movies_SeriesController::class, "index"]);
  Route::get("single_show/{id}", [Movies_SeriesController::class, "show"]);


  // CategoriesMsController.Api
Route::group(["middleware"=> ["auth:api"]],function(){
  Route::post("create_categoryms", [CategoriesMsController::class, "store"]);
  Route::post("update_categoryms/{id}", [CategoriesMsController::class, "update"]);
  Route::delete("delete_categoryms/{id}", [CategoriesMsController::class, "destroy"]);
});
  Route::get("list_categoriesms/{id}", [CategoriesMsController::class, "index"]);



//FavoriteController
  Route::middleware('auth:api')->post("store_favorite_show/{id}", [FavoriteController::class, "store"]);
Route::middleware('auth:api')->get("list_favorite_show", [FavoriteController::class, "index"]);


//WatchingNowController
Route::middleware('auth:api')->post("store_watching_now/{id}", [WatchingNowController::class, "store"]);
Route::middleware('auth:api')->get("list_watching_now", [WatchingNowController::class, "index"]);



 // ViewShowController.Api
 Route::middleware('auth:api')->post("list_show_views/{id}", [ViewShowController::class, "index"]);


 // CommentShowController.Api

 Route::group(["middleware"=> ["auth:api"]],function(){

  Route::post("create_show_comment", [CommentShowController::class, "store"]);
  Route::post("update_show_comment/{id}", [CommentShowController::class, "update"]);
  Route::delete("delete_show_comment/{id}", [CommentShowController::class, "destroy"]);

});
  Route::get("list_show_comments/{id}", [CommentShowController::class, "index"]);



  // VideosMsController.Api

 Route::group(["middleware"=> ["auth:api"]],function(){

  Route::post("create_videoms", [VideosMsController::class, "store"]);
  Route::post("update_videoms/{id}", [VideosMsController::class, "update"]);
  Route::delete("delete_videoms/{id}", [VideosMsController::class, "destroy"]);

});
  Route::get("list_videosms/{id}", [VideosMsController::class, "index"]);


  // CastingCrewController.Api

 Route::group(["middleware"=> ["auth:api"]],function(){

  Route::post("create_casting_crew", [CastingCrewController::class, "store"]);
  Route::post("update_casting_crew/{id}", [CastingCrewController::class, "update"]);
  Route::delete("delete_videoms/{id}", [CastingCrewController::class, "destroy"]);

});
  Route::get("list_casting_crews/{id}", [CastingCrewController::class, "index"]);



   // UserRatingController.Api

   Route::middleware('auth:api')->post("create_show_rate/{id}", [RateController::class, "store"]);

   