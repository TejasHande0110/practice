<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});


Route::post('/register', [StudentController::class, 'add']);

Route::get('/SignUp' , function(){
    return view('SignUp');
});

Route::get('/login', function(){
    return view('login');
});

Route::post('/loginUser', [StudentController::class, 'login']);


Route::get('/home', [BookController::class,'showBooks']);