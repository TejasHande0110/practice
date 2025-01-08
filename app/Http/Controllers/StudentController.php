<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function add(Request $request){

           $validated = $request->validate([
                 'name' => 'required | max:20 ',
                 'email' =>  'required | email  ',
                 'pno' => 'required | numeric | size:10',
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
          $pass = $request->input('pass');

          if($email){
             $student_id = Student::select('student_id')
             ->where('email', $email)
             ->where('pass', $pass)
             ->first();
             
             session(['user_id' => $student_id['student_id']]);
             
             return redirect('/home');
             

             
          }
     }
}
