<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact',function(){
        return view('contact');

});
Route::get('/about',function(){
        return view('about');

});
Route::get('/post',function(){
        return view('post');
});

Route::group(['prefix'=>'dashboard'], function(){
Route::resource('/',DashboardController::class);
Route::resource('/posts',PostsController::class);
Route::get('/posts/actions/add',[PostsController::class,'showAdd']);
Route::get('/users', [UsersController::class, 'getUsers']);
Route::post('/users', [UsersController::class, 'createUsers']);


});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
