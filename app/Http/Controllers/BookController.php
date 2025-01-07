<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function showBooks(){
        $books = Book::all();

        return view('home', ['books' => $books]);

    }
}
