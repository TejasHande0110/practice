<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function add(Request $request){
           $student = new Student;
           $student->name = $request->input('name');
           $student->email = $request->input('email');
           $student->pno = $request->input('pno');
           $student->department = $request->input('department');
           $student->pass = $request->input('pass');
           $student->save();

           redirect('/login');
    }

    public function login(Request $request){  

          $email = $request->input('email');    
          $pass = $request->input('pass');

          if($email){
             $student_id = Student::select('student_id')
             ->where('email', $email)
             ->where('pass', $pass)
             ->first();
             
             
             
             return redirect('/home')->with( ['student_id' => $student_id] );
             

             
          }
     }
}
