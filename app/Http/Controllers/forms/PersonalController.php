<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }

    public $gender = array('Man' => 'Man','Woman'=>'Woman','Gay'=>'Gay','Lesbian'=>'Lesbian', 'Bisexual' => 'Bisexual', 'Transgender' => 'Transgender', 'Genderqueer' => 'Genderqueer', 'Other' => 'Other', 'Not' => 'Prefer not to say');

    public function index(){
        $genderlist = $this->gender;
        return view('students.forms.personal', compact('genderlist'));
    }

    public function edit(){
        $genderlist = $this->gender;
        $data = auth()->user()->studentpersonal;
        return view('students.update-forms.personal', compact('data', 'genderlist'));
    }

    public function store(Request $request){

        $request['genderlist'] = $this->gender;
        $this->validate($request, [
            'lastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'firstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'middleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'extName' =>    'nullable|string|regex:/^[\pL\s\-]+$/u|max:30',
            'birthDay' => 'required|date',
            'birthPlace' => 'required|string|max:150',
            'sex' => 'required|in:1,2',
            'gender' => 'required|in_array:genderlist.*',
            'weight' => 'nullable|numeric|min:1|max:500',
            'height' => 'nullable|numeric|min:1|max:500',
        ],
        [
            'lastName.required' => 'Lastname is required',
            'firstName.required' => 'Firstname is required',
            'birthDay.required' => 'Birthday is required',
            'birthPlace.required' => 'Birthplace is required',
            'sex.required' => 'Sex is required.',
            'gender.required' => 'Gender is required.',
            'birthDay.date' => 'Birthday is not a date.',
            'weight.numeric' => 'Weight should be a number.',
            'height.numeric' => 'Height should be a number.',
        ]);

         $newDateFormat2 = date('Y-m-d', strtotime($request->birthDay));
         $request->birthDay = $newDateFormat2;

         try {
            DB::transaction(function () use($request) {
                $request->user()->studentpersonal()->create([
                    'lastname' => $request->lastName,
                    'firstname' => $request->firstName,
                    'middlename' => $request->middleName,
                    'extension' => $request->extName,
                    'birthday' => $request->birthDay,
                    'birthplace' => $request->birthPlace,
                    'sex' => $request->sex,
                    'gender' => $request->gender,
                    'height' => $request->height,
                    'weight' => $request->weight,
                ]);
                
                $request->user()->studentformstatus()->update([
                    'form1' => 1
                ]);
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 1 is saved successfully!');
        
    }

    
    public function update(Request $request){
        $request['genderlist'] = $this->gender;
        $this->validate($request, [
            'lastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'firstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'middleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'extName' =>    'nullable|string|regex:/^[\pL\s\-]+$/u|max:30',
            'birthDay' => 'required|date',
            'birthPlace' => 'required|string|max:150',
            'sex' => 'required|in:1,2',
            'gender' => 'required|in_array:genderlist.*',
            'weight' => 'nullable|numeric|min:1|max:500',
            'height' => 'nullable|numeric|min:1|max:500',
        ],
        [
            'lastName.required' => 'Lastname is required',
            'firstName.required' => 'Firstname is required',
            'birthDay.required' => 'Birthday is required',
            'birthPlace.required' => 'Birthplace is required',
            'sex.required' => 'Sex is required.',
            'gender.required' => 'Gender is required.',
            'birthDay.date' => 'Birthday is not a date.',
            'weight.numeric' => 'Weight should be a number.',
            'height.numeric' => 'Height should be a number.',
        ]);

         $newDateFormat2 = date('Y-m-d', strtotime($request->birthDay));
         $request->birthDay = $newDateFormat2;

         try {
            DB::transaction(function () use($request) {
                $request->user()->studentpersonal()->update([
                    'lastname' => $request->lastName,
                    'firstname' => $request->firstName,
                    'middlename' => $request->middleName,
                    'extension' => $request->extName,
                    'birthday' => $request->birthDay,
                    'birthplace' => $request->birthPlace,
                    'sex' => $request->sex,
                    'gender' => $request->gender,
                    'height' => $request->height,
                    'weight' => $request->weight,
                ]);
        
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 1 is updated successfully!');
    }    

}
