<?php

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

Auth::routes();


Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'post'], function () {

    Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::get('/{id}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::get('/{id}/{mansoor}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
});