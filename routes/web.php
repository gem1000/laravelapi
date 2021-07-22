<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert','HomeController@Insert');
Route::get('/edit','HomeController@Edit');
Route::get('/read','HomeController@Read');
Route::get('/delete','HomeController@Delete');