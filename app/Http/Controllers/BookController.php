<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Rules\Maxlength;
use Barryvdh\Debugbar\Facades\Debugbar;
class BookController extends Controller
{
    //
    public function showBooks(){
        $books = Book::all();
        Debugbar::info($books);
        return view('purchaseHome', ['books' => $books]);

    }

    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            
            $books = Book::where('book_name', 'like', $query . '%')->get();
            if(!$books){
                DebugBar::error('No Book Exist');
            }
        } else {
            
            $books = Book::all();
        }
        Debugbar::startMeasure('render','Time for rendering');

        return view('purchaseHome', compact('books'));
    }

    public function addBooks(Request $request)
{
    $validated = $request->validate([
        'book_name' => 'required|max:30|string',
        'description' => ['required', 'string', new Maxlength],
        'author' => 'required|string|max:25',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    
    $imageName = time() . '.' . $request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    
    $book = new Book;
    $book->book_name = $validated['book_name'];
    $book->author = $validated['author'];
    $book->description = $validated['description'];
    $book->image = $imageName; 
    $book->save();
    if(!$book){
        DebugBar::error('failed to Insert');
    }
    
    return redirect('addBook')->with('success', 'Book added successfully!');
}

}
