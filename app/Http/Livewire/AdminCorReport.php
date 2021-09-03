<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\IDNumbers;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;

class AdminCorReport extends Component
{
     //Database Models;
     public $courses;
     public $sections;
     public $subjects;

     //Select list
    public $sectionlist = [1 => 1, 2 => 2, 3 => 3, 4 => 4];

    public $coursemodel = null;
    public $sectionmodel = null;

    public function render()
    {
        return view('livewire.admin-cor-report',[
            'courseslist' => $this->courses
        ]);
    }

    public function mount(){
        //dd(User::with('studentToSubject')->get());
       // dd(Section::with('sectionToStudent', 'sectionToStudent.studentpersonal', 'sectionToStudent.studentcontact')->where('course_id', 5)->where('section', 'like', '%1%')->get());
        // dd(User::with('studentToSection', 'studentpersonal')->whereHas('studentToSection', function ($query) {
        //     $query->where('course_id', 5)
        //     ->where('section', 'like', '%1%');
        //         })->get()->sortBy('studentpersonal.lastname',SORT_REGULAR,false)->sortBy('studentpersonal.firstname',SORT_REGULAR,false));
        
                $this->courses = Course::all();
    }


     public function submit(){
        $this->validate([
            'coursemodel' =>  'required',
            'sectionmodel' => 'required|in:1,2,3,4',
          ],
          [
            'coursemodel.required' => 'Course is required.',
            'sectionmodel.required' => 'Year Level is required.'
          ]);


        $studlist = User::with('studentToSection', 'studentpersonal')->whereHas('studentformstatus' ,function($q){
            return $q->whereNotNull('form1')
            ->whereNotNull('form2')
            ->whereNotNull('form3')
            ->whereNotNull('form4')
            ->whereNotNull('form5')
            ->whereNotNull('form6')
            ->whereNotNull('section')
            ->whereNotNull('signature');
        })->whereHas('studentToSection', function ($query) {
            $query->where('course_id', $this->coursemodel)
            ->where('section', 'like', '%'.$this->sectionmodel.'%');
                })->get()->sortBy('studentpersonal.lastname',SORT_REGULAR,false)->sortBy('studentpersonal.firstname',SORT_REGULAR,false);

        
        //Create COR
    if(count($studlist) > 0){
        $html = '';
        $html .= view('students.documents.admin-whiteform-start')->render();

        foreach ($studlist as $stud) {
            $studstatus =IDNumbers::where('id', $stud->personalid)->first();
        $semester = Semester::where('status', 'active')->first();
        $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) use($stud){
            $query->where('student_courses.user_id', $stud->id);
                })->first();
        
        $getsubject = Subject::whereHas('subjectToStudent', function ($query) use($stud){
            $query->where('student_subjects.user_id', $stud->id);
                })->get();
            $unitstotal = null;
            $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey($stud->id)->first();
            
            
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

        } 
        $html .= view('students.documents.admin-whiteform-end')->render();
        $pdfContent = PDF::loadHTML($html)->output();
        
        return response()->streamDownload(
             fn () => print($pdfContent),
             "COR (Whiteforms).pdf"
        );

     }
     else{
            //NO STUDENTS
     }


     }

     public function backPage(){
        return redirect()->route('excelreport');
    }

    
 

}
