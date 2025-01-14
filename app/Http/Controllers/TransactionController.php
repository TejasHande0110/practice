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
        
        $transaction = Transaction::select('transaction_id')
                          ->where('book_id', $book_id)
                          ->where('student_id', $student_id)
                          ->first();

        if($transaction){
            return redirect()->back()->with('failure','Book Already Purchased');
        }else{
            
        $student = Student::select('name' , 'email')
        ->active($student_id)
        ->first();


        $book = Book::select('book_name')
                ->where('book_id', $book_id)
                ->first();



        $transaction = new Transaction();
        $transaction->student_id = $student_id;
        $transaction->name = $student['name'];
        $transaction->book_id = $book_id;
        $transaction->mail = $student['email'];
        $transaction->book_name = $book['book_name'];

        $transaction->save();


        return redirect()->back()->with('success','Book Purchased Successfully');
        }

    }
     
    public function history(){
        $transaction = Transaction::
                       active(session('user_id'))->get();
                       
        return view('transaction', ['transactions' => $transaction]);
    }

}
