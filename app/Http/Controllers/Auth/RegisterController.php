<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\EmailValidation;
use App\Rules\IDValidation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('students.register');
    }

    public function store(Request $request){
        $this->validate($request, [
            'id' => 'required|min:9|max:9|string',
            'verification' => ['required','min:7','max:7','string', new IDValidation($request->id) ],
            'email' => ['required', 'email', 'max:255', new EmailValidation()],
            'password' => 'required|confirmed|min:8|max:255',
        ]);
       
        try {
            DB::transaction(function () use($request) {
                Auth::login($user = User::create([
                    'personalid' => $request->id,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_role' => 3
                ]));
                

                $user->attachRole('student');
                event(new Registered($user));

               $user->studentformstatus()->create();
               
            });
        } catch (\Throwable $th) {
            throw $th;
        } 

        return redirect()->route('dashboard'); 
    }

}
