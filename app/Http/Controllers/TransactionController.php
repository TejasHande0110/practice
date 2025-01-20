<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Mail\TransactionPlaced; 

use Illuminate\Support\Facades\Mail;
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
            
        $student = Student::select('name' , 'email', 'department')
        ->active($student_id)
        ->first();

        


        $book = Book::select('book_name', 'image')
                ->where('book_id', $book_id)
                ->first();

        
        $date = Carbon::now();
        
        $transaction = new Transaction();
        $transaction->student_id = $student_id;
        $transaction->name = $student['name'];
        $transaction->book_id = $book_id;
        $transaction->email = $student['email'];
        $transaction->book_name = $book['book_name'];
        $transaction->book_image = $book['image'];
        $transaction->renew = $date->addDays(7)->format('Y-m-d'); 
    
        $transaction->save();
        // Mail::to($transaction->email)->queue(new TransactionPlaced($transaction)); 

        return redirect()->back()->with('success','Book Purchased Successfully');
        }

    }

   
    public function history(){

        if(Auth::check()){
            $transaction = Transaction::
                       active(session('user_id'))->get();
                       
            return view('transaction', ['transactions' => $transaction]);
        }else{
          return redirect('/login')>with('failure', 'Log in First!!!');
        }
        
    }
    
    public function getRenew(){
        if(Auth::check()){
            $transactions = Transaction::select('transaction_id', 'name', 'book_name', 'student_id', 'renew', 'created_at', 'book_id')
            ->where('student_id', Auth::id())
            ->where('renew', '<', Carbon::today())
            ->get();
            DebugBar::info($transactions);
            return view('renewHome', ['transactions' => $transactions]);
        }else{
            return redirect('/login')>with('failure', 'Log in First!!!');
        }
    }

    public function sendRequest(Request $request, $transaction_id){
        if (Auth::check()) {
            $transaction = Transaction::where('student_id', Auth::id())
                ->where('transaction_id', $transaction_id)
                ->first();
    
            if ($transaction->status == 'pending') {
                return redirect()->back()->with('failure', 'Request Already Sent!!');
            }else{
                $transaction->status = 'pending';
                $transaction->save();
                return redirect()->back()->with('success', 'Renew Request Sent!!');
            }
            }else{
                return redirect('/login')->with('failure','Invalid Access!');
            }

    }

    public function getReturnBook(){
        $transactions = Transaction::select('transaction_id', 'name', 'book_name', 'created_at', 'renew')
                                    ->whereIn('status',['active', 'pending', 'rejected'])
                                    ->where('student_id', Auth::id())
                                    ->get();
        
        return view('returnRequest', ['transactions' => $transactions]);
    }

    public function sendReturnReq($id){

        $transaction = Transaction::select('status')
                       ->where('transaction_id', $id)
                       ->first();
                       
        if($transaction['status'] == 'return'){
            
            return redirect()->with('failure', "Return Request Placed Already!");
        }else{
            $transaction = Transaction::where('transaction_id', $id)
                                        ->update([
                                            'status' => 'return'
                                        ]);
            return redirect()->back()->with("success", "Return Request Placed!!");
        }
        
        
        
    }


}

