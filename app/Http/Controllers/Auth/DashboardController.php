<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['verified']);
    }

    
    public function index(){
       
        if(Auth::user()->hasRole('admin')){
            return view('admin.index');
        }
        elseif(Auth::user()->hasRole('teacher')){
            return view('teacher.index');
        }
        elseif(Auth::user()->hasRole('student')){
            
            return view('students.dashboard');
        }
        else{
            return redirect()->route('studenthome');
        }
    }
}
