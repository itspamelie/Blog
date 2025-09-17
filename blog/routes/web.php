<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
Route::get('/',function(){
        return view('admin.dashboard');
});
Route::get('/users', [UsersController::class, 'getUsers']);
});



