<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return redirect('/login');
});



//Student Route
Route::post('/register', [StudentController::class, 'add']);
Route::get('/SignUp' , function(){
    return view('SignUp');
})->name('SignUp');

Route::get('/login', function(){

    if(Auth::check()){
        return redirect('/purchase');
    }
    return view('login');
})->name('login');



Route::get('/logout', [StudentController::class, 'logout']);
Route::post('/loginUser', [StudentController::class, 'login']);
Route::get('/home', [StudentController::class, 'home'])->name('home');
Route::get('/history',[TransactionController::class,'history']);
Route::get('/purchase/{user_id}/{book_id}/',[TransactionController::class,'buy']);
Route::get('/purchase', [BookController::class,'showBooks']);
Route::get('/Searchbooks', [BookController::class, 'index'])->name('books.index');

Route::get('/request/{transaction_id}', [TransactionController::class,'sendRequest']);
Route::get('/returnBook', [TransactionController::class,'getReturnBook'])->middleware('auth');
Route::get('/return/{transaction_id}',[TransactionController::class, 'sendReturnReq']);



//Admin Routes
Route::post('/loginAdmin', [AdminController::class, 'login']);
Route::get('/admin_dash', [AdminController::class,'dash']);
Route::get('/addBook', function(){
    return view('addBook');
});
Route::post('/bookadd', [BookController::class,'addBooks']);

Route::get('/allbuys', [AdminController::class,'showAll']);
Route::get('/showAll', function(){
    return view('ShowTransaction');
});

Route::get('/adminlogout', [AdminController::class,'logout']);

Route::get('/renew',[TransactionController::class, 'getRenew']);
Route::get('/renewRequests', [AdminController::class,'getRequest']);

Route::get('/returnRequest',[AdminController::class, 'loadReturnHome']);
Route::post('/approveRequest/{transaction_id}', [AdminController::class, 'approveRequest'])->name('approveRequest');
Route::post('/rejectRequest/{transaction_id}', [AdminController::class, 'rejectRequest'])->name('rejectRequest');

Route::post('/approveReturn/{transaction_id}', [AdminController::class, 'approveReturn'])->name('approveReturn');
Route::post('/rejectReturn/{transaction_id}', [AdminController::class, 'rejectReturn'])->name('rejectReturn');
Route::get('/reports', [AdminController::class, 'showOverview']);
Route::get('/admin/detailedReport/{student_id}',[AdminController::class, 'generateReport'])->name('report.generate');

