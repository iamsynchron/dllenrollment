<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\IDNumbers;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IDNumberController extends Controller
{

    public $prefix = array('013A' => '013A', '013B' => '013B', '014A' => '014A', '014B' => '014B', '015A' => '015A', '015B' => '015B', '016A' => '016A', '016B' => '016B', '017A' => '017A', '017B' => '017B', '018A' => '018A', '018B' => '018B', '019A' => '019A', '019B' => '019B', '020A' => '020A', '020B' => '020B', '021A' => '021A', '021B' => '021B');

    public function index(){
        $prefixlist = $this->prefix; 
        return view('admin.create-account', compact('prefixlist'));
    }


    protected function generateUniqueCode()
            {

            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersNumber = strlen($characters);
            $codeLength = 7;

            $code = '';

            while (strlen($code) < 7) {
                $position = rand(0, $charactersNumber - 1);
                $character = $characters[$position];
                $code = $code.$character;
            }

            if (IDNumbers::where('code', $code)->exists()) {
                $this->generateUniqueCode();
            }

            return $code;
            }


    public function store(Request $request){
        $request['pref'] = $this->prefix;
        
        $this->validate($request, [
            'lastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'firstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'middleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'idprefix' => 'required|in_array:pref.*',
            'idnumber' => 'required|digits:4',
            'type' => 'required|in:1,2,3,4'
        ],
        [
            'lastName.required' => 'Lastname is required',
            'firstName.required' => 'Firstname is required',
            'idprefix.required' => 'Prefix is required',
            'idnumber.required' => 'ID Number is required.',
            'type.required' => 'Type is required.'
        ]);

        $idnumber = $request->idprefix."-".$request->idnumber;
        $check = IDNumbers::where('id', $idnumber)->first();
        
        
        if(!is_null($check)){
            return back()->with('message', 'ID Number already exists.');
        }
        else{
            try {
                DB::transaction(function () use($request, $idnumber) {
                    $name = "";
                    if(is_null($request->middleName)){
                        $name = $request->lastName.", ".$request->firstName;
                    }
                    else{
                        $name = $request->lastName.", ".$request->firstName." ".$request->middleName;
                    }
                    IDNumbers::create(
                        ['id' => $idnumber, 'code' => $this->generateUniqueCode(), 'name' => $name, 'type' => $request->type]
                    );
                });
            } catch (\Throwable $th) {
                throw $th;
            }
            return redirect()->route('accounts')->with('message', 'Account created successfully!');
        }

    }
    

}

