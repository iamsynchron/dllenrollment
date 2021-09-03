<?php

namespace App\Http\Controllers\forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationalTwoController extends Controller
{
    public function __construct()
   {
       $this->middleware(['verified']);
   }

    public $track = array('Academic Track' => array('ABM' => 'Accountancy, Business, and Management (ABM)', 'HUMMS' => 'Humanities and Social Sciences (HUMSS)', 'STEM' => 'Science, Technology, Engineering, and Mathematics (STEM)', 'GAS' => 'General Academic Strand (GAS)'), 'TVL Track' => array('TVL-Agri' => 'Agri-Fishery Arts', 'TVL-HomeEcon' => 'Home Economics', 'TVL-ICT' => 'Information and Communications Technology (ICT)', 'TVL-Industrial' => 'Industrial Arts'), 'Sports Track' => array('Sports' => 'Sports Track'), 'Arts and Design Track' => array('Arts' => 'Arts and Design', 'None' => 'Not Applicable'));

    public function index()
    {
        $tracklist = $this->track;
        return view('students.forms.educational-two', compact('tracklist'));
    }

    public function edit(){
        $tracklist = $this->track;
        $data = auth()->user()->studentschooltwo;
        return view('students.update-forms.educational-two', compact('data', 'tracklist'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'seniorSchool' => 'required|string|max:100',
            'seniorTrack' => 'required|in:ABM,HUMMS,STEM,GAS,TVL-Agri,TVL-HomeEcon,TVL-ICT,TVL-Industrial,Sports,Arts,None',
            'seniorAttendance' => 'required|integer|min:1900|max:2021|lte:seniorGraduate',
            'seniorGraduate' => 'required|integer|min:1900|max:2021',
            'seniorHonor' => 'nullable|string|max:100',

            'vocationalCheck' => 'in:0,1',
            'vocationalSchool' => 'required_if:vocationalCheck,1|string|max:100|nullable',
            'vocationalCourse' => 'nullable|string|max:100',
            'vocationalGraduated' => 'in:1,2',
            'vocationalUnits' => 'required_if:vocationalGraduated,2|max:255|nullable',
            'vocationalAttendance' => 'required_if:vocationalGraduated,1|integer|min:1900|max:2021|nullable|lte:vocationalGraduate',
            'vocationalGraduate' => 'required_if:vocationalGraduated,1|integer|min:1900|max:2021|nullable',
            'vocationalHonor' => '',

            'collegeCheck' => 'in:0,1',
            'collegeSchool' => 'required_if:collegeCheck,1|string|max:100|nullable',
            'collegeCourse' => 'nullable|string|max:100',
            'collegeGraduated' => 'in:1,2',
            'collegeUnits' => 'required_if:collegeGraduated,2|string|max:255|nullable',
            'collegeAttendance' => 'required_if:collegeGraduated,1|integer|min:1900|max:2021|nullable|lte:collegeGraduate',
            'collegeGraduate' => 'required_if:collegeGraduated,1|integer|min:1900|max:2021|nullable',
            'collegeHonor' => 'nullable|string|max:100',

            'transferCheck' => 'in:0,1',
            'transferSchool' => 'required_if:transferCheck,1|string|max:100|nullable',
            'transferCourse' => 'nullable|string|max:100',
            'transferUnits' => 'required_if:transferCheck,1|string|max:100|nullable',
            'transferAttendance' => 'required_if:transferCheck,1|integer|min:1900|max:2021|nullable|lte:transferLeft',
            'transferLeft' => 'required_if:transferCheck,1|integer|min:1900|max:2021|nullable'

        ],
        [
            'seniorSchool.required' => 'School name is required',
            'seniorTrack.required' => 'Track and Strand is required',
            'seniorAttendance.required' => 'Year Attended is required',
            'seniorGraduate.required' => 'Year Graduated is Required',

            'vocationalSchool.required_if' => 'School name is required', 
            'vocationalUnits.required_if' => 'This field is required',            
            'vocationalAttendance.required_if' => 'This field is required', 
            'vocationalGraduate.required_if' => 'This field is required', 

            'collegeSchool.required_if' => 'School name is required', 
            'collegeUnits.required_if' => 'This field is required',            
            'collegeAttendance.required_if' => 'This field is required', 
            'collegeGraduate.required_if' => 'This field is required', 

            'transferSchool.required_if' => 'School name is required', 
            'transferUnits.required_if' => 'This field is required',            
            'transferAttendance.required_if' => 'Year Attended is required', 
            'transferLeft.required_if' => 'Year Transferred is required', 
            'lte' => 'Year Attended invalid'
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentschooltwo()->create([
            
                    'seniorSchool' => $request->seniorSchool,
                    'seniorStrand' => $request->seniorTrack,
                    'seniorAttended' => $request->seniorAttendance,
                    'seniorGraduated' => $request->seniorGraduate,
                    'seniorHonor' => $request->seniorHonor,
                    'vocationalCheck' => $request->vocationalCheck,
                    'vocationalSchool' => $request->vocationalSchool,
                    'vocationalCourse' => $request->vocationalCourse,
                    'vocationalOptiongrad' => $request->vocationalGraduated,
                    'vocationalUnits' => $request->vocationalUnits,
                    'vocationalAttended' => $request->vocationalAttendance,
                    'vocationalGraduated' => $request->vocationalGraduate,
                    'vocationalHonor' => $request->vocationalHonor,
                    'collegeCheck' => $request->collegeCheck,
                    'collegeSchool' => $request->collegeSchool,
                    'collegeCourse' => $request->collegeCourse,
                    'collegeOptiongrad' => $request->collegeGraduated,
                    'collegeUnits' => $request->collegeUnits,
                    'collegeAttended' => $request->collegeAttendance,
                    'collegeGraduated' => $request->collegeGraduate,
                    'collegeHonor' => $request->collegeHonor,
                    'transferCheck' => $request->transferCheck,
                    'transferSchool' => $request->transferSchool,
                    'transferCourse' => $request->transferCourse,
                    'transferUnits' => $request->transferUnits,
                    'transferAttended' => $request->transferAttendance,
                    'transferTransferred' => $request->transferLeft
        
                ]);
        
                $request->user()->studentformstatus()->update([
                    'form6' => 1
                ]);
            });
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('studentinformation')->with('message', 'Form 6 is updated successfully!');
    }

    public function update(Request $request){
        $this->validate($request, [

            'seniorSchool' => 'required|string|max:100',
            'seniorTrack' => 'required|in:ABM,HUMMS,STEM,GAS,TVL-Agri,TVL-HomeEcon,TVL-ICT,TVL-Industrial,Sports,Arts',
            'seniorAttendance' => 'required|integer|min:1900|max:2021|lte:seniorGraduate',
            'seniorGraduate' => 'required|integer|min:1900|max:2021',
            'seniorHonor' => 'nullable|string|max:100',

            'vocationalCheck' => 'in:0,1',
            'vocationalSchool' => 'required_if:vocationalCheck,1|string|max:100|nullable',
            'vocationalCourse' => 'nullable|string|max:100',
            'vocationalGraduated' => 'in:1,2',
            'vocationalUnits' => 'required_if:vocationalGraduated,2|max:255|nullable',
            'vocationalAttendance' => 'required_if:vocationalGraduated,1|integer|min:1900|max:2021|nullable|lte:vocationalGraduate',
            'vocationalGraduate' => 'required_if:vocationalGraduated,1|integer|min:1900|max:2021|nullable',
            'vocationalHonor' => '',

            'collegeCheck' => 'in:0,1',
            'collegeSchool' => 'required_if:collegeCheck,1|string|max:100|nullable',
            'collegeCourse' => 'nullable|string|max:100',
            'collegeGraduated' => 'in:1,2',
            'collegeUnits' => 'required_if:collegeGraduated,2|string|max:255|nullable',
            'collegeAttendance' => 'required_if:collegeGraduated,1|integer|min:1900|max:2021|nullable|lte:collegeGraduate',
            'collegeGraduate' => 'required_if:collegeGraduated,1|integer|min:1900|max:2021|nullable',
            'collegeHonor' => 'nullable|string|max:100',

            'transferCheck' => 'in:0,1',
            'transferSchool' => 'required_if:transferCheck,1|string|max:100|nullable',
            'transferCourse' => 'nullable|string|max:100',
            'transferUnits' => 'required_if:transferCheck,1|string|max:100|nullable',
            'transferAttendance' => 'required_if:transferCheck,1|integer|min:1900|max:2021|nullable|lte:transferLeft',
            'transferLeft' => 'required_if:transferCheck,1|integer|min:1900|max:2021|nullable'

        ],
        [
            'seniorSchool.required' => 'School name is required',
            'seniorTrack.required' => 'Track and Strand is required',
            'seniorAttendance.required' => 'Year Attended is required',
            'seniorGraduate.required' => 'Year Graduated is Required',

            'vocationalSchool.required_if' => 'School name is required', 
            'vocationalUnits.required_if' => 'This field is required',            
            'vocationalAttendance.required_if' => 'This field is required', 
            'vocationalGraduate.required_if' => 'This field is required', 

            'collegeSchool.required_if' => 'School name is required', 
            'collegeUnits.required_if' => 'This field is required',            
            'collegeAttendance.required_if' => 'This field is required', 
            'collegeGraduate.required_if' => 'This field is required', 

            'transferSchool.required_if' => 'School name is required', 
            'transferUnits.required_if' => 'This field is required',            
            'transferAttendance.required_if' => 'Year Attended is required', 
            'transferLeft.required_if' => 'Year Transferred is required', 
            'lte' => 'Year Attended invalid'
        ]);

        try {
            DB::transaction(function () use($request) {
                $request->user()->studentschooltwo()->update([
            
                    'seniorSchool' => $request->seniorSchool,
                    'seniorStrand' => $request->seniorTrack,
                    'seniorAttended' => $request->seniorAttendance,
                    'seniorGraduated' => $request->seniorGraduate,
                    'seniorHonor' => $request->seniorHonor,
                    'vocationalCheck' => $request->vocationalCheck,
                    'vocationalSchool' => $request->vocationalSchool,
                    'vocationalCourse' => $request->vocationalCourse,
                    'vocationalOptiongrad' => $request->vocationalGraduated,
                    'vocationalUnits' => $request->vocationalUnits,
                    'vocationalAttended' => $request->vocationalAttendance,
                    'vocationalGraduated' => $request->vocationalGraduate,
                    'vocationalHonor' => $request->vocationalHonor,
                    'collegeCheck' => $request->collegeCheck,
                    'collegeSchool' => $request->collegeSchool,
                    'collegeCourse' => $request->collegeCourse,
                    'collegeOptiongrad' => $request->collegeGraduated,
                    'collegeUnits' => $request->collegeUnits,
                    'collegeAttended' => $request->collegeAttendance,
                    'collegeGraduated' => $request->collegeGraduate,
                    'collegeHonor' => $request->collegeHonor,
                    'transferCheck' => $request->transferCheck,
                    'transferSchool' => $request->transferSchool,
                    'transferCourse' => $request->transferCourse,
                    'transferUnits' => $request->transferUnits,
                    'transferAttended' => $request->transferAttendance,
                    'transferTransferred' => $request->transferLeft
        
                ]);
        
               
            });
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('studentinformation')->with('message', 'Form 6 is updated successfully!');
        
    }
}
