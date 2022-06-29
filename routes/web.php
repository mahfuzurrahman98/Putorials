<?php

use App\Http\Controllers\Tag;
use App\Http\Controllers\Blog;
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

Route::get('/', [Blog::class, "home"]);
Route::get('/home', [Blog::class, "home"]);
Route::get('/tutorials', [Blog::class, "index"]);
Route::get('tutorial/{id}', [Blog::class, "show"]);
