<?php

use App\Post;
use Illuminate\Http\Request;
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

Route::get('/posts/', 'PostController@allPost');

// Route::get('/posts/insert', 'PostController@insertPost');

Route::get('/post/form', function () {
    return view('post_form');
});

Route::post('/post', 'PostController@insertPost');