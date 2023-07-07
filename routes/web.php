<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/web/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');

Route::post('api/ketetapan/import', 'App\Http\Controllers\API\SpptController@importKetetapan');
Route::get('api/ketetapan', 'App\Http\Controllers\API\KetetapanController@index');

Auth::routes();
