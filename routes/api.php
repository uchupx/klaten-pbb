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

Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
 Route::get('/profile', function (Request $request) {
  return auth()->user();
 });

 // API route for logout user
 Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);

 Route::get('/ketetapan', 'App\Http\Controllers\API\KetetapanController@index');
 Route::post('/ketetapan', 'App\Http\Controllers\API\KetetapanController@post');
 Route::put('/ketetapan/{id}', 'App\Http\Controllers\API\KetetapanController@put');
 Route::get('/ketetapan/{id}', 'App\Http\Controllers\API\KetetapanController@findByid');
 Route::delete('/ketetapan/{id}', 'App\Http\Controllers\API\KetetapanController@delete');
 Route::post('/ketetapan/import', 'App\Http\Controllers\API\SpptController@importKetetapan');

 Route::get('/sppt', 'App\Http\Controllers\API\SpptController@index');
 Route::post('/sppt', 'App\Http\Controllers\API\SpptController@post');
 Route::put('/sppt/{id}', 'App\Http\Controllers\API\SpptController@put');
 Route::delete('/sppt/{id}', 'App\Http\Controllers\API\SpptController@delete');
 Route::get('/sppt/{id}', 'App\Http\Controllers\API\SpptController@findByid');

 Route::get('/nop', 'App\Http\Controllers\API\NopController@index');
 Route::post('/nop', 'App\Http\Controllers\API\NopController@post');
 Route::put('/nop/{id}', 'App\Http\Controllers\API\NopController@put');
 Route::delete('/nop/{id}', 'App\Http\Controllers\API\NopController@delete');
 Route::get('/nop/{id}', 'App\Http\Controllers\API\NopController@findByid');
});
