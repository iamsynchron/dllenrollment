<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use App\Rules\CheckDeceased;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FamilyController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }
   
    public function index(){
        return view('students.forms.family');
    }

    public function edit(){
        $data = auth()->user()->studentfamily;
        return view('students.update-forms.family', compact('data'));
    }

    public function store(Request $request){

         $this->validate($request, [
           
            // Problems (Deceased Validation)
            
            'fatherdeceasedCheck' => 'in:0,1',
            'fatherLastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherFirstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherAge' => 'nullable|numeric|min:1|max:120',
            'fatherOccupation' => 'nullable|string|max:100',
            'fatherAddress' => 'nullable|string|max:150',
            'fatherContact' => 'nullable|string|max:13',

            'motherdeceasedCheck' => 'in:0,1',
            'motherLastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherFirstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherAge' => 'nullable|numeric|min:1|max:120',
            'motherOccupation' => 'nullable|string|max:100',
            'motherAddress' => 'nullable|string|max:150',
            'motherContact' => 'nullable|string|max:13',

            'guardianRadio' => ['in:1,2,3', new CheckDeceased($request->motherdeceasedCheck, $request->fatherdeceasedCheck )],
            'guardianRelationship' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianLastName' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianFirstName' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'guardianAge' => 'nullable|numeric|min:1|max:120',
            'guardianOccupation' => 'nullable|string|max:100',
            'guardianAddress' => 'nullable|string|max:150',
            'guardianContact' => 'nullable|string|max:13'
         ],
         [
            'guardianRelationship.required_if' => 'Guardian Relationship is required',
            'guardianLastName.required_if' => 'Lastname is required',
            'guardianFirstName.required_if' => 'Firstname is required',
            'fatherLastName.required' => 'Lastname is required',
            'fatherFirstName.required' => 'Firstname is required',
            'motherLastName.required' => 'Lastname is required',
            'motherFirstName.required' => 'Firstname is required',
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentfamily()->create([
                    'father_isdeceased' => $request->fatherdeceasedCheck,
                    'father_lname' => $request->fatherLastName,
                    'father_fname' => $request->fatherFirstName,
                    'father_mname' => $request->fatherMiddleName,
                    'father_age' => $request->fatherAge,
                    'father_occup' => $request->fatherOccupation,
                    'father_address' => $request->fatherAddress,
                    'father_mobile' => $request->fatherContact,
                    'mother_isdeceased' => $request->motherdeceasedCheck,
                    'mother_lname' => $request->motherLastName,
                    'mother_fname' => $request->motherFirstName,
                    'mother_mname' => $request->motherMiddleName,
                    'mother_age' => $request->motherAge,
                    'mother_occup' => $request->motherOccupation,
                    'mother_address' => $request->motherAddress,
                    'mother_mobile' => $request->motherContact,
                    'guardianOption' => $request->guardianRadio,
                    'guardian_rel' => $request->guardianRelationship,
                    'guardian_lname' => $request->guardianLastName,
                    'guardian_fname' => $request->guardianFirstName,
                    'guardian_mname' => $request->guardianMiddleName,
                    'guardian_age' => $request->guardianAge,
                    'guardian_occup' => $request->guardianOccupation,
                    'guardian_address' => $request->guardianAddress,
                    'guardian_mobile' => $request-> guardianContact
                ]);
                $request->user()->studentformstatus()->update([
                    'form3' => 1
                ]);
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('studentinformation')->with('message', 'Form 3 is updated successfully!');
        
    }

    public function update(Request $request){

        $this->validate($request, [
           
            // Problems (Deceased Validation)
            
            'fatherdeceasedCheck' => 'in:0,1',
            'fatherLastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherFirstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'fatherAge' => 'nullable|numeric|min:1|max:120',
            'fatherOccupation' => 'nullable|string|max:100',
            'fatherAddress' => 'nullable|string|max:150',
            'fatherContact' => 'nullable|string|max:13',

            'motherdeceasedCheck' => 'in:0,1',
            'motherLastName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherFirstName' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'motherAge' => 'nullable|numeric|min:1|max:120',
            'motherOccupation' => 'nullable|string|max:100',
            'motherAddress' => 'nullable|string|max:150',
            'motherContact' => 'nullable|string|max:13',

            'guardianRadio' => ['in:1,2,3', new CheckDeceased($request->motherdeceasedCheck, $request->fatherdeceasedCheck )],
            'guardianRelationship' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianLastName' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianFirstName' => 'required_if:guardianRadio,3|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'guardianMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'guardianAge' => 'nullable|numeric|min:1|max:120',
            'guardianOccupation' => 'nullable|string|max:100',
            'guardianAddress' => 'nullable|string|max:150',
            'guardianContact' => 'nullable|string|max:13'
         ],
         [
            'guardianRelationship.required_if' => 'Guardian Relationship is required',
            'guardianLastName.required_if' => 'Lastname is required',
            'guardianFirstName.required_if' => 'Firstname is required',
            'fatherLastName.required' => 'Lastname is required',
            'fatherFirstName.required' => 'Firstname is required',
            'motherLastName.required' => 'Lastname is required',
            'motherFirstName.required' => 'Firstname is required',
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentfamily()->update([
                    'father_isdeceased' => $request->fatherdeceasedCheck,
                    'father_lname' => $request->fatherLastName,
                    'father_fname' => $request->fatherFirstName,
                    'father_mname' => $request->fatherMiddleName,
                    'father_age' => $request->fatherAge,
                    'father_occup' => $request->fatherOccupation,
                    'father_address' => $request->fatherAddress,
                    'father_mobile' => $request->fatherContact,
                    'mother_isdeceased' => $request->motherdeceasedCheck,
                    'mother_lname' => $request->motherLastName,
                    'mother_fname' => $request->motherFirstName,
                    'mother_mname' => $request->motherMiddleName,
                    'mother_age' => $request->motherAge,
                    'mother_occup' => $request->motherOccupation,
                    'mother_address' => $request->motherAddress,
                    'mother_mobile' => $request->motherContact,
                    'guardianOption' => $request->guardianRadio,
                    'guardian_rel' => $request->guardianRelationship,
                    'guardian_lname' => $request->guardianLastName,
                    'guardian_fname' => $request->guardianFirstName,
                    'guardian_mname' => $request->guardianMiddleName,
                    'guardian_age' => $request->guardianAge,
                    'guardian_occup' => $request->guardianOccupation,
                    'guardian_address' => $request->guardianAddress,
                    'guardian_mobile' => $request-> guardianContact
                ]);
        
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 3 is updated successfully!');
        
    }
}
