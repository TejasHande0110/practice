<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    //
    public function add(Request $request){

           $validated = $request->validate([
                 'name' => 'required | max:20 | alpha ',
                 'email' =>  'required | email | unique:students',
                 'pno' => 'required | size:10',
                 'department' => 'required | max:30',
                 'pass' => 'required | string | min:6',
           ]);
           
          

           $student = new Student;
           $student->name = $request->input('name');
           $student->email = $request->input('email');
           $student->pno = $request->input('pno');
           $student->department = $request->input('department');
           $student->password = bcrypt($request->input('pass'));
           $student->save();

           return redirect('/login');
    }

    public function login(Request $request){  
      $credentials = $request->validate([
        'email' => 'required|email',
        'pass' => 'required|string',
    ]);

    
    if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['pass']])) {
        $student = Auth::user();
        session(['user_id' => $student->student_id]); 
        session(['user_name' => $student->name]);
        
        return redirect()->route('home');
    }else{
       return redirect()->back()->with('failure', 'Invalid Credentials');
    }    
    }
     

    
     public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect('/login')->with('success' , 'logged Out Successfully!!');
    }

    public function home(){
      
      if(Auth::check()){
        return view('home');
      }else{
        return redirect('/login');
      }
    }
     
}
