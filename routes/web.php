<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/p/create' , [App\Http\Controllers\PostsController::class, 'create'] )->name('posts.create');
Route::post('/p' , [App\Http\Controllers\PostsController::class, 'store'] )->name('posts.store');
Route::get('/p/{id}' , [App\Http\Controllers\PostsController::class, 'show'] )->name('posts.show');
