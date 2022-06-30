<?php

use App\Http\Controllers\Blog;
use App\Http\Controllers\User;
use App\Http\Controllers\Category;
use Illuminate\Support\Facades\Route;

/*
|
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

// admin routes
//-----------------------------------
Route::get('/admin', [Blog::class, "adminIndex"])->middleware('admin_auth');

// admin login
Route::get('admin/login', function () {
  return view('admin.login');
})->middleware('admin_logged_auth');
Route::post('/login', [User::class, "login"]);

// admin logout
Route::get('/admin/logout', [User::class, "logout"]);

// admin blog crud
Route::get('/admin/add', function () {
  $categories = (new Category())->index();
  return view('admin.add')->with('categories', $categories);
});
Route::post('/admin/store', [Blog::class, "store"]);
Route::get('/admin/view/{id}', [Blog::class, "show"]);
Route::get('/admin/edit/{id}', [Blog::class, "edit"]);
Route::post('/admin/update', [Blog::class, "update"]);
Route::get('/admin/delete/{id}', [Blog::class, "destroy"]);
