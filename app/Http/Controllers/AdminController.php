<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Support\Facades\DB; 
class AdminController extends Controller
{
    //
    public function login(Request $request){
        
        if($request->admin_id == '101' && $request->admin_email == 'admin@admin.com' &&$request->admin_password == 'admin'){
            session(['admin' => 1]);
            return redirect('/admin_dash');
        }else{
            return redirect('/login');
        }
    }

    public function showAll(){
        $transaction =  Transaction::all();
    
        return view('ShowTransaction', [ 'transactions' => $transaction ]);
    }

    public function logout(Request $request)
    {
       
        $request->session()->flush();
        return redirect('/login')->with('success' , 'logged Out Successfully!!');
    }

    public function dash(){
        if(session('admin')){
            return view('addBook');
        }else{
            return redirect('/login');
        }
    }

    public function getRequest(){
        if(session('admin')){
        $pendingRequests = Transaction::where('status', 'pending')->get();
        return view('pending', ['requests' => $pendingRequests]);
    }else{
        return redirect('/login');
    }
    }

    public function approveRequest(Request $request, $transaction_id){
        if(session('admin')){

            $date = Carbon::now();
            $date = $date->addDays(7)->format('Y-m-d');
            $pendingRequests = Transaction::where('transaction_id', $transaction_id)
                                  ->update([
                                    'status' => "active",
                                    'renew' => $date
                                  ]);
                                  
                            
            
            return redirect('returnRequest');
        }else{
            return redirect('/login');
        }
    }


    public function rejectRequest(Request $request, $transaction_id){
        if(session('admin')){
        $pendingRequests = Transaction::where('transaction_id', $transaction_id)
                          ->update(['status' => "rejected"]);
        return redirect('returnRequest');
        }else{
        return redirect('/login');
        }
    }

    public function loadReturnHome(){
        if(session('admin')){
            $returnRequest = Transaction::where('status', 'return')->get();
            return view('adminReturnHome', ['requests' => $returnRequest]);
        }else{
            return redirect('/login');
        }
    }

    public function rejectReturn(Request $request, $transaction_id){
        if(session('admin')){
        $pendingRequests = Transaction::where('transaction_id', $transaction_id)
                          ->update(['status' => "rejected"]);
        return redirect('/renewRequests');
        }else{
        return redirect('/login');
        }
    }

    public function approveReturn($transaction_id){
        if(session('admin')){

            
            $pendingRequests = Transaction::where('transaction_id', $transaction_id)
                                  ->update([
                                    'status' => "received",
                                  ]);
                                  

            return redirect('/returnRequest');
        }else{
            return redirect('/login');
        }
    }


    public function showOverview()
    {
        if(!session('admin')){ return redirect('/login');}
        

        
        $students = Transaction::select('transactions.*')
        ->joinSub(function ($query) {
            $query->select('student_id', DB::raw('MAX(created_at) as max_created_at'))
                ->from('transactions')
                ->groupBy('student_id');
        }, 'latest_transaction', function ($join) {
            $join->on('transactions.student_id', '=', 'latest_transaction.student_id')
                 ->on('transactions.created_at', '=', 'latest_transaction.max_created_at');
        })
        ->orderByDesc('transactions.created_at')
        ->get();
        
        return view('adminReport', [
            'students' => $students
        ]);
    }

    public function generateReport($studentId)
    {
        if(!session('admin')){ return redirect('/login');}
        
        $student = Student::findOrFail($studentId);
        $transactions = Transaction::where('student_id', $studentId)->get();

        
        $totalBooksPurchased = $transactions->count();
        $booksReturned = $transactions->where('status','received')->count();
        $booksReturnedLate = $transactions->where('status', 'rejected')->count();
        $booksReturnedOnTime = $transactions->where('status', 'received')->count();
        $activeBooks = $transactions->where('status', 'active')->count();

       
        return view('detailedReport', [
            'student' => $student,
            'transactions' => $transactions,
            'totalBooksPurchased' => $totalBooksPurchased,
            'booksReturned' => $booksReturned,
            'booksReturnedLate' => $booksReturnedLate,
            'booksReturnedOnTime' => $booksReturnedOnTime,
            'activeBooks' => $activeBooks
        ]);
    }

}
