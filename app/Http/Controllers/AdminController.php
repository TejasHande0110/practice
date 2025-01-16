<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
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
                                  

            return redirect('/adminReturnHome');
        }else{
            return redirect('/login');
        }
    }

}
