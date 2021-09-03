<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveInfoController extends Controller
{

    public function __construct()
   {
       $this->middleware(['verified']);
   }

   
    public function index(){

        $info = User::with('studentpersonal:id,created_at,user_id', 'studentcontact:id,created_at,user_id', 'studentfamily:id,created_at,user_id', 'studentadditional:id,created_at,user_id', 'studentschoolone:id,created_at,user_id', 'studentschooltwo:id,created_at,user_id')->whereKey(auth()->user()->id)->first();
 
        return view('students.studentinfo',[
            'info' => $info
        ]);


    }

}
