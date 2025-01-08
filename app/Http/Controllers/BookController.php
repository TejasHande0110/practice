<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Rules\Maxlength;

class BookController extends Controller
{
    //
    public function showBooks(){
        $books = Book::all();

        return view('purchaseHome', ['books' => $books]);

    }

    public function addBooks(Request $request){
            $validated = $request->validate([
                'book_name' => 'required | max:30 | string',
                'description' => [ 'required' , 'string', new Maxlength ],
                'author' => 'required | string | max:25',

            ]);

            $book = new Book;
            $book->book_name = $validated['book_name'];
            $book->author = $validated['author'];
            $book->description = $validated['description'];
            $book->save();
            return view('purchaseHome',['books' => Book::all()] );
    }
}
