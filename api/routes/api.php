<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'cors'], function() {
    Route::resource('/food', 'FoodController')->except(["create", "edit"]);
    Route::resource('/category', 'FoodCategoryController')->except(["create", "edit"]);
    Route::resource('/order', 'OrderController');
    Route::post('/login', 'UserController@Login');
    Route::post('/register', 'UserController@Register');
    Route::get('/user/{user}', 'UserController@getUser');
    Route::post('/food/comment', 'FoodController@createComment');
    Route::put('/food/comment', 'FoodController@updateComment');
    Route::delete('/food/comment/{comment}', 'FoodController@deleteComment');
});
