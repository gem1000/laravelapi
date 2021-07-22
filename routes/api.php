<?php
use App\Models\Post;
use App\Models\Comment;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', 'HomeController@getPosts');

Route::post('/json/posts/', 'TestApiController@createPost');

Route::get('/comments/{id}', 'HomeController@getComment');

Route::get('/posts/{id}', 'HomeController@getPost');

Route::post('/posts', 'HomeController@enterPost');

Route::put('/posts/{id}', 'HomeController@update');

Route::delete('/posts/{id}', 'HomeController@delete');