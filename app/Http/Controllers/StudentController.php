<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class StudentController extends Controller
{
    //
    public function add(Request $request){

           $validated = $request->validate([
                 'name' => 'required | max:20 | alpha ',
                 'email' =>  'required | email  ',
                 'pno' => 'required | size:10',
                 'department' => 'required | max:30',
                 'pass' => 'required | string | min:6',
           ]);
           
          

           $student = new Student;
           $student->name = $request->input('name');
           $student->email = $request->input('email');
           $student->pno = $request->input('pno');
           $student->department = $request->input('department');
           $student->pass = $request->input('pass');
           $student->save();

           return redirect('/login');
    }

    public function login(Request $request){  

          $email = $request->input('email');    
          $pass  = $request->input('pass');

          if($email){

             $student_id = Student::select('student_id', 'pass', 'name')
             ->where('email', $email)
             ->first();
             
            
             
             if(Hash::check($pass, $student_id['pass']) || $pass == $student_id['pass']){
               session(['user_id' => $student_id['student_id']]);
               session(['user_name' => $student_id['name']]);
             
               return redirect('/home');
             }
   
          }
     }

    
     public function logout(Request $request)
    {
        
        $request->session()->flush();

       
        return redirect('/login')->with('success' , 'logged Out Successfully!!');
    }
     
}
