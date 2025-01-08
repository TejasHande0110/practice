<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    public function buy($student_id,$book_id){
        
 

       
        

        $student = Student::select('name')
                   ->where('student_id', $student_id)
                   ->first();
        
        
       
        

        $book = Book::select('book_name')
                   ->where('book_id', $book_id)
                   ->first();
   
           
        
        $transaction = new Transaction();
        $transaction->student_id = $student_id;
        $transaction->name = $student['name'];
        $transaction->book_id = $book_id;
        $transaction->book_name = $book['book_name'];

        $transaction->save();

       
        return view('transaction', ['transactions' => Transaction::get()]);
    }
     
    public function history(){
        $transaction = Transaction::all()
                       ->where('student_id', session('user_id'));
                       
        return view('transaction', ['transactions' => $transaction]);
    }

}
