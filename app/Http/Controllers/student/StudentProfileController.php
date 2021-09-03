<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\IDNumbers;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{

   
   public function __construct()
   {
       $this->middleware(['verified']);
   }

   
   public $forms = array(
      "form1" => "studentpersonal",
      "form2" => "studentcontact",
      "form3" => "studentfamily",
      "form4" => "studentadditional",
      "form5" => "studentschoolone",
      "form6" => "studentschooltwo",
    );



    public function index(){
     $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) {
                   $query->where('users.id', auth()->user()->id);
                       })->first();

      $getsubject = Subject::whereHas('subjectToStudent', function ($query) {
         $query->where('student_subjects.user_id', auth()->user()->id);
              })->get();
      $studtype = is_null($getcourse) ? null : $getcourse->sectionToStudent->where('id', auth()->user()->id)->first();
      $unitstotal = null;

        $track = array('ABM' => 'Accountancy, Business, and Management (ABM)', 'HUMMS' => 'Humanities and Social Sciences (HUMSS)', 'STEM' => 'Science, Technology, Engineering, and Mathematics (STEM)', 'GAS' => 'General Academic Strand (GAS)', 'TVL-Agri' => 'Agri-Fishery Arts', 'TVL-HomeEcon' => 'Home Economics', 'TVL-ICT' => 'Information and Communications Technology (ICT)', 'TVL-Industrial' => 'Industrial Arts', 'Sports' => 'Sports Track', 'Arts' => 'Arts and Design', 'None' => 'Not');   
        $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey(auth()->user()->id)->first();
        return view('students.profile',[
            'info' => $info,
            'track' => $track,
            'getcourse' => $getcourse,
            'getsubject' => $getsubject,
            'studtype' => $studtype,
            'unitstotal' => $unitstotal
        ]);
 
     }

     public function profilepdf(){
         $devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

         $track = array('ABM' => 'Accountancy, Business, and Management (ABM)', 'HUMMS' => 'Humanities and Social Sciences (HUMSS)', 'STEM' => 'Science, Technology, Engineering, and Mathematics (STEM)', 'GAS' => 'General Academic Strand (GAS)', 'TVL-Agri' => 'Agri-Fishery Arts', 'TVL-HomeEcon' => 'Home Economics', 'TVL-ICT' => 'Information and Communications Technology (ICT)', 'TVL-Industrial' => 'Industrial Arts', 'Sports' => 'Sports Track', 'Arts' => 'Arts and Design', 'None' => 'Not Applicable');
         $getsubject = Subject::whereHas('subjectToStudent', function ($query) {
         $query->where('student_subjects.user_id', auth()->user()->id);
              })->get();
         $unitstotal = null;
         
        $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) {
         $query->where('student_courses.user_id', auth()->user()->id);
              })->first();
         $studtype = is_null($getcourse) ? null : $getcourse->sectionToStudent->where('id', auth()->user()->id)->first();
        $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey(auth()->user()->id)->first();
        $pdf = PDF::loadView('students.documents.info', compact('info', 'getcourse', 'getsubject', 'unitstotal', 'studtype', 'track'));
        $pdf->setPaper('Folio', 'portrait');

      if($devicecheck){
         return $pdf->download('MIS Form('.auth()->user()->personalid.').pdf');
      }else{
         return $pdf->stream('MIS Form('.auth()->user()->personalid.').pdf');
      }
           
        
     }



     public function corpdf(){
      $devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

      //Others
      $studstatus =IDNumbers::where('id', auth()->user()->personalid)->first();
      $semester = Semester::where('status', 'active')->first();
      $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) {
         $query->where('student_courses.user_id', auth()->user()->id);
              })->first();
    
      $getsubject = Subject::whereHas('subjectToStudent', function ($query) {
         $query->where('student_subjects.user_id', auth()->user()->id);
              })->get();
         $unitstotal = null;
        $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey(auth()->user()->id)->first();
        
        
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



        $pdf = PDF::loadView('students.documents.whiteform', compact('info', 'getcourse', 'getsubject', 'semester', 'unitstotal', 'studstatus',      'fixed_fee', 'handbook','schoolid','admission','computer','laboratory','tuition','nstpfee','totaltuition','totalmisc','total'));
        $pdf->setPaper('Letter', 'portrait');

        if($devicecheck){
         return $pdf->download('COR('.auth()->user()->personalid.').pdf');
        }else{
         return $pdf->stream('COR('.auth()->user()->personalid.').pdf');
        }
        
     }



     public function schedpdf(){
      $devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),"mobile"));

      $studstatus =IDNumbers::where('id', auth()->user()->personalid)->first();
      $semester = Semester::where('status', 'active')->first();
      $getcourse = Section::with('sectionToStudent', 'coursebelong')->whereHas('sectionToStudent', function ($query) {
         $query->where('student_courses.user_id', auth()->user()->id);
              })->first();
      $getsubject = Subject::whereHas('subjectToStudent', function ($query) {
      $query->where('student_subjects.user_id', auth()->user()->id);
            })->get();
      $unitstotal = null;

      $info = User::with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentsignature')->whereKey(auth()->user()->id)->first();
      $pdf = PDF::loadView('students.documents.schedule', compact('info', 'getcourse', 'semester', 'getsubject', 'unitstotal','studstatus'));
      $pdf->setPaper('Letter', 'landscape');

      
      if($devicecheck){
         return $pdf->download('Schedule('.auth()->user()->personalid.').pdf');
      }else{
         return $pdf->stream('Schedule('.auth()->user()->personalid.').pdf');
      }
   }
}
