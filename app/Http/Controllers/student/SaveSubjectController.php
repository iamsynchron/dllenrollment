<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaveSubjectController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }
   
    public function index(){

        return view('students.studentsubjects');
 
     }

     public function edit(){

        return view('students.updatestudentsubjects');

     }

}
