<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }
   
    public function index(){
        return view('students.forms.contact');
    }

    public function edit(){
        $data = auth()->user()->studentcontact;
        return view('students.update-forms.contact', compact('data'));
    }

    public function store(Request $request){

        //Problems (Mobile, Telephone, Checkbox, old)

         $this->validate($request, [
            'mobileNumber' => 'nullable|string|max:13',
            'telephoneNumber' => 'nullable|string|max:13', 
            'residentialStreet' => 'nullable|string|max:255',
            'residentialBrgy' => 'required|string|max:255',
            'residentialCity' => 'required|string|max:255',
            'residentialProvince' => 'required|string|max:255',
            'residentialZip' => 'required|numeric|max:9999',
            'permanentCheck' => 'in:0,1',
            'permanentStreet' => 'nullable|string|max:255',
            'permanentBrgy' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentCity' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentProvince' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentZip' => 'required_unless:permanentCheck,1|numeric|max:9999|nullable'
         ],
         [
            'residentialBrgy.required' => 'Barangay is required',
            'residentialCity.required' => 'City is required',
            'residentialProvince.required' => 'Province is required',
            'residentialZip.required' => 'Zip Code is required',
            'permanentBrgy.required_unless' => 'Barangay is required.',
            'permanentCity.required_unless' => 'City is required.',
            'permanentProvince.required_unless' => 'Province is required.',
            'permanentZip.required_unless' => 'Zip Code is required.',
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentcontact()->create([
                    'mobilenumber' => $request->mobileNumber,
                    'telephonenumber' => $request->telephoneNumber,
                    'res_street' => $request->residentialStreet,
                    'res_brgy' => $request->residentialBrgy,
                    'res_city' => $request->residentialCity,
                    'res_province' => $request->residentialProvince,
                    'res_zip' => $request->residentialZip,
                    'is_permanent' => $request->permanentCheck,
                    'per_street' => $request->permanentStreet,
                    'per_brgy' => $request->permanentBrgy,
                    'per_city' => $request->permanentCity,
                    'per_province' => $request->permanentProvince,
                    'per_zip' => $request->permanentZip
                ]);
                $request->user()->studentformstatus()->update([
                    'form2' => 1
                ]);
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 2 is updated successfully!');



    }

    public function update(Request $request){
         $this->validate($request, [
            'mobileNumber' => 'nullable|string|max:13',
            'telephoneNumber' => 'nullable|string|max:13', 
            'residentialStreet' => 'nullable|string|max:255',
            'residentialBrgy' => 'required|string|max:255',
            'residentialCity' => 'required|string|max:255',
            'residentialProvince' => 'required|string|max:255',
            'residentialZip' => 'required|numeric|max:9999',
            'permanentCheck' => 'in:0,1',
            'permanentStreet' => 'nullable|string|max:255',
            'permanentBrgy' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentCity' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentProvince' => 'required_unless:permanentCheck,1|string|max:255|nullable',
            'permanentZip' => 'required_unless:permanentCheck,1|numeric|max:9999|nullable'
         ],
         [
            'residentialBrgy.required' => 'Barangay is required',
            'residentialCity.required' => 'City is required',
            'residentialProvince.required' => 'Province is required',
            'residentialZip.required' => 'Zip Code is required',
            'permanentBrgy.required_unless' => 'Barangay is required.',
            'permanentCity.required_unless' => 'City is required.',
            'permanentProvince.required_unless' => 'Province is required.',
            'permanentZip.required_unless' => 'Zip Code is required.',
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentcontact()->update([
                    'mobilenumber' => $request->mobileNumber,
                    'telephonenumber' => $request->telephoneNumber,
                    'res_street' => $request->residentialStreet,
                    'res_brgy' => $request->residentialBrgy,
                    'res_city' => $request->residentialCity,
                    'res_province' => $request->residentialProvince,
                    'res_zip' => $request->residentialZip,
                    'is_permanent' => $request->permanentCheck,
                    'per_street' => $request->permanentStreet,
                    'per_brgy' => $request->permanentBrgy,
                    'per_city' => $request->permanentCity,
                    'per_province' => $request->permanentProvince,
                    'per_zip' => $request->permanentZip
                ]);
        
                
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('studentinformation')->with('message', 'Form 2 is updated successfully!');
        
    }

}
