<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationalOneController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }
   
    public function index(){
        return view('students.forms.educational-one');
    }

    public function edit(){
        $data = auth()->user()->studentschoolone;
        return view('students.update-forms.educational-one', compact('data'));
    }

    public function store(Request $request){

        $this->validate($request, [
          
           // Problems (Change Error Message)
           'lrn' => 'required|numeric',
           'elemSchool' => 'required|string|max:100',
           'elemAttendance' => 'required|integer|min:1900|max:2021|lte:elemGraduate',
           'elemGraduate' => 'required|integer|min:1900|max:2021',
           'elemHonor' => 'nullable|string|max:100',

           'juniorSchool' => 'required|string|max:100',
           'juniorAttendance' => 'required|integer|min:1900|max:2021|lte:juniorGraduate',
           'juniorGraduate' => 'required|integer|min:1900|max:2021',
           'juniorHonor' => 'nullable|string|max:100',

        ],
        [
            'lrn.required' => 'LRN is required',
            'elemSchool.required' => 'School name is required',
            'elemAttendance.required' => 'Year attended is required',
            'elemGraduate.required' => 'Year graduated is required',
            'juniorSchool.required' => 'School name is required',
            'juniorAttendance.required' => 'Year attended is required',
            'juniorGraduate.required' => 'Year graduated is required',
            'lte' => 'Year Attended invalid'
        ]);


        try {
            DB::transaction(function () use($request) {
                $request->user()->studentschoolone()->create([
                    'lrn' => $request->lrn,
                    'elemSchool' => $request->elemSchool,
                    'elemAttended' => $request->elemAttendance,
                    'elemGraduated' => $request->elemGraduate,
                    'elemHonor' => $request->elemHonor,
                    'juniorSchool' => $request->juniorSchool,
                    'juniorAttended' => $request->juniorAttendance,
                    'juniorGraduated' => $request->juniorGraduate,
                    'juniorHonor' => $request->juniorHonor
                ]);
                
                $request->user()->studentformstatus()->update([
                    'form5' => 1
                ]);
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 5 is updated successfully!');
   }

   public function update(Request $request){
        $this->validate($request, [
            
            // Problems (Change Error Message)
            'lrn' => 'required|numeric',
            'elemSchool' => 'required|string|max:100',
            'elemAttendance' => 'required|integer|min:1900|max:2021|lte:elemGraduate',
            'elemGraduate' => 'required|integer|min:1900|max:2021',
            'elemHonor' => 'nullable|string|max:100',

            'juniorSchool' => 'required|string|max:100',
            'juniorAttendance' => 'required|integer|min:1900|max:2021|lte:juniorGraduate',
            'juniorGraduate' => 'required|integer|min:1900|max:2021',
            'juniorHonor' => 'nullable|string|max:100',

        ],
        [
            'lrn.required' => 'LRN is required',
            'elemSchool.required' => 'School name is required',
            'elemAttendance.required' => 'Year attended is required',
            'elemGraduate.required' => 'Year graduated is required',
            'juniorSchool.required' => 'School name is required',
            'juniorAttendance.required' => 'Year attended is required',
            'juniorGraduate.required' => 'Year graduated is required',
            'lte' => 'Year Attended invalid'
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentschoolone()->update([
                    'lrn' => $request->lrn,
                    'elemSchool' => $request->elemSchool,
                    'elemAttended' => $request->elemAttendance,
                    'elemGraduated' => $request->elemGraduate,
                    'elemHonor' => $request->elemHonor,
                    'juniorSchool' => $request->juniorSchool,
                    'juniorAttended' => $request->juniorAttendance,
                    'juniorGraduated' => $request->juniorGraduate,
                    'juniorHonor' => $request->juniorHonor
                ]);
        
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        
        return redirect()->route('studentinformation')->with('message', 'Form 5 is updated successfully!');
        
    }

}
