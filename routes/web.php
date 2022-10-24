<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use GuzzleHttp\Middleware;

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

/* Laravel:7
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
});
*/

// Laravel:9
Route::controller(NewsController::class) -> prefix ('admin') -> middleware('auth') -> group ( function(){
    Route::get('/news/create','add');
    Route::post('/news/create','create');
    Route::get('/news','index');
    Route::get('/news/edit','edit');
    Route::post('/news/edit','update');
    Route::get('/news/delete','delete');
});

Route::controller(ProfileController::class) -> prefix ('admin') -> middleware('auth') -> group ( function(){
    Route::get('/profile/create', 'add');
    Route::get('/profile/edit', 'edit');
    Route::post('/profile/create','create');
    Route::post('/profile/edit','update');
    Route::get('/profile','index');
    Route::get('/profile/delete','delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');