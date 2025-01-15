<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
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
}
