<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;


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

Route::get('/home', [HomeController::class, 'home'])->name('home');


//Route::get('/categories/home', [CategoryController::class, 'home'])->name('categories.home');


//Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\CategoryController::class)
        ->middleware('is_admin');

    Route::resource('posts', \App\Http\Controllers\PostController::class)
        ->middleware('is_admin');
});

Route::get('about', function () {
    return view('about');
});


Route::get('contact', function () {
    return view('contact');
});

Route::resource('categories', CategoryController::class);

Route::resource('posts', PostController::class);


Route::post('/posts', [PostController::class, 'store'])->name('posts.store');



require __DIR__ . '/auth.php';
