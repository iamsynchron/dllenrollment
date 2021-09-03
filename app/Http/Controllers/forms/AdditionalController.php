<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdditionalController extends Controller
{

    public function __construct()
    {
        $this->middleware(['verified']);
    }


    public $civil = array('Single' => 'Single','Married'=>'Married','Separated'=>'Separated','Widow'=>'Widow');

    public function index(){
        $civillist = $this->civil;
        return view('students.forms.additional', compact('civillist'));
    }

    public function edit(){
        $civillist = $this->civil;
        $data = auth()->user()->studentadditional;
        return view('students.update-forms.additional', compact('data', 'civillist'));
    }

    public function store(Request $request){

        $request['civil'] = $this->civil;

        $this->validate($request, [
          
           // Problems (Checkbox, radio, old)

           //Insurance
           'insuranceRadio' => 'in:1,2',
           'insuranceLastName' => 'required_if:insuranceRadio,2|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
           'insuranceFirstName' => 'required_if:insuranceRadio,2|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
           'insuranceMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
           'insuranceAddress' => 'nullable|string|max:150',
           'insuranceContact' => 'nullable|string|max:13',

            'civilStatus' => 'required|in_array:civil.*',
            'citizenship' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
            'religion' => 'required|string|max:100',

            'specialRadio' => 'in:1,2',
            'specialDisability' => 'required_if:specialRadio,1|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',  
            
            'indigenousRadio' => 'in:1,2',
            'indigenousMinority' => 'required_if:indigenousRadio,1|string|regex:/^[\pL\s\-]+$/u|max:100|nullable'
        ],
        [
           'insuranceLastName.required_if' => 'Lastname is required',
           'insuranceFirstName.required_if' => 'Firstname is required',
           'civilStatus.required' => 'Civil Status is required',
           'citizenship.required' => 'Citizenship is required',
           'religion.required' => 'Religion is required',
           'specialDisability.required_if' => 'Required if the answer is YES',
           'indigenousMinority.required_if' => 'Required if the answer is YES',
       ]);

       try {
        DB::transaction(function () use($request) {
            $request->user()->studentadditional()->create([
                'insuranceOption' => $request->insuranceRadio,
                'insurance_lname' => $request->insuranceLastName,
                'insurance_fname' => $request->insuranceFirstName,
                'insurance_mname' => $request->insuranceMiddleName,
                'insurance_address' => $request->insuranceAddress,
                'insurance_mobile' => $request->insuranceContact,
                'civilstatus' => $request->civilStatus,
                'citizenship' => $request->citizenship,
                'religion' => $request->religion,
                'specialOption' => $request->specialRadio,
                'specialdisability' => $request->specialDisability,
                'indigenousRadio' => $request->indigenousRadio,
                'indigenousminority' => $request->indigenousMinority
           ]);
    
           $request->user()->studentformstatus()->update([
            'form4' => 1
        ]);
           
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 4 is updated successfully!');
   }

   public function update(Request $request){
            $request['civil'] = $this->civil;

            $this->validate($request, [
            
            // Problems (Checkbox, radio, old)

            //Insurance
            'insuranceRadio' => 'in:1,2',
            'insuranceLastName' => 'required_if:insuranceRadio,2|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'insuranceFirstName' => 'required_if:insuranceRadio,2|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',
            'insuranceMiddleName' => 'nullable|string|regex:/^[\pL\s\-]+$/u|max:100',
            'insuranceAddress' => 'nullable|string|max:150',
            'insuranceContact' => 'nullable|string|max:13',

                'civilStatus' => 'required|in_array:civil.*',
                'citizenship' => 'required|string|regex:/^[\pL\s\-]+$/u|max:100',
                'religion' => 'required|string|max:100',

                'specialRadio' => 'in:1,2',
                'specialDisability' => 'required_if:specialRadio,1|string|regex:/^[\pL\s\-]+$/u|max:100|nullable',  
                
                'indigenousRadio' => 'in:1,2',
                'indigenousMinority' => 'required_if:indigenousRadio,1|string|regex:/^[\pL\s\-]+$/u|max:100|nullable'
            ],
            [
            'insuranceLastName.required_if' => 'Lastname is required',
            'insuranceFirstName.required_if' => 'Firstname is required',
            'civilStatus.required' => 'Civil Status is required',
            'citizenship.required' => 'Citizenship is required',
            'religion.required' => 'Religion is required',
            'specialDisability.required_if' => 'Required if the answer is YES',
            'indigenousMinority.required_if' => 'Required if the answer is YES',
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentadditional()->update([
                    'insuranceOption' => $request->insuranceRadio,
                    'insurance_lname' => $request->insuranceLastName,
                    'insurance_fname' => $request->insuranceFirstName,
                    'insurance_mname' => $request->insuranceMiddleName,
                    'insurance_address' => $request->insuranceAddress,
                    'insurance_mobile' => $request->insuranceContact,
                    'civilstatus' => $request->civilStatus,
                    'citizenship' => $request->citizenship,
                    'religion' => $request->religion,
                    'specialOption' => $request->specialRadio,
                    'specialdisability' => $request->specialDisability,
                    'indigenousRadio' => $request->indigenousRadio,
                    'indigenousminority' => $request->indigenousMinority
            ]);
    
            
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 4 is updated successfully!');
       
    }
}
