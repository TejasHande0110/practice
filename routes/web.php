<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
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


Route::get('/home', function(){
    return view('home');
});

Route::get('/history',[TransactionController::class,'history']);

Route::get('/purchase/{user_id}/{book_id}/',[TransactionController::class,'buy']);

Route::get('/purchase', [BookController::class,'showBooks']);

Route::post('/bookadd', [BookController::class,'addBooks']);

Route::get('/addBook', function(){
    return view('addBook');
});
