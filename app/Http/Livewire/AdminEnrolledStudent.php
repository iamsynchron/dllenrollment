<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\IDNumbers;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;


class AdminEnrolledStudent extends Component
{

    public $search = '';
    public $confirming;

    public function render()
    {
        return view('livewire.admin-enrolled-student',[
            'subjects' => User::search($this->search)->with('studentToSubject','studentpersonal', 'studentToSection')->whereHas('studentformstatus' ,function($q){
                return $q->whereNotNull('form1')
                ->whereNotNull('form2')
                ->whereNotNull('form3')
                ->whereNotNull('form4')
                ->whereNotNull('form5')
                ->whereNotNull('form6')
                ->whereNotNull('section')
                ->whereNotNull('signature');
            })->where('users.user_role', 3)->paginate(10),
            'courses' => Course::all(),
            'sections' => Section::all()
        ]);
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function showInformation($id){
        dd('info');
        // redirect()->route('changesubjects', ['subid' => $id]);
     }

    public function downloadCOR($id){
            //Create COR
        $html = '';
        $html .= view('students.documents.admin-whiteform-start')->render();

        
        $semester = Semester::where('status', 'active')->first();
        $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) use($id){
            $query->where('student_courses.user_id', $id);
                })->first();
        
        $getsubject = Subject::whereHas('subjectToStudent', function ($query) use($id){
            $query->where('student_subjects.user_id', $id);
                })->get();
            $unitstotal = null;
        $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey($id)->first();
        
        $studstatus =IDNumbers::where('id', $info->personalid)->first();
            
        //Assessment
        
        $fixed_fee = ['athletic' => 250, 'cultural' => 200, 'development' => 1250, 'guidance' => 250, 'library' => 300, 'medical' => 250, 'registration' => 250 ];
        
        //New Students and Transferees
        $handbook = 0;
        $schoolid = 0;
        $admission = 0;

        //Changing depends on subject
        $computer = 500;
        $laboratory = 0;
        
        //Tuition
        $tuition = 0;
        $nstpfee = 0;
        
        //Total
        $totaltuition = 0;
        $totalmisc = 0;
        $total = 0;

        
        $html .= view('students.documents.admin-whiteform-content', compact('info', 'getcourse', 'getsubject', 'semester', 'unitstotal', 'studstatus',      'fixed_fee', 'handbook','schoolid','admission','computer','laboratory','tuition','nstpfee','totaltuition','totalmisc','total'))->render();
        $html .= view('students.documents.admin-whiteform-break')->render();
 
        $html .= view('students.documents.admin-whiteform-end')->render();
        $pdfContent = PDF::loadHTML($html)->output();
        
        
        return response()->streamDownload(
             fn () => print($pdfContent),
             $info->personalid.".pdf"
        );
    }
}
