<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\other\EnrollStatus;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Studentdashboard extends Component
{
 
    public $forms = array(
        "form1" => "studentpersonal",
        "form2" => "studentcontact",
        "form3" => "studentfamily",
        "form4" => "studentadditional",
        "form5" => "studentschoolone",
        "form6" => "studentschooltwo",
      );

    public $count = 0;
    public $percentage = 0;
    public $get_announcement = null;
    public $displaytype = null;

   // public $showmodal = false;

    
    

    public function render()
    {
        return view('livewire.studentdashboard',[
            'announcements' => Announcement::paginate(3),
            'data' => $this->getForms(),
            'getsignature' => auth()->user()->studentsignature,
            'getsubject' => Subject::whereHas('subjectToStudent', function ($query) {
              $query->where('student_subjects.user_id', auth()->user()->id);
                   })->get(),
            'getsection' => User::with('studentToSection')->where('id', auth()->user()->id)->first(),
            'enrollstatus' => EnrollStatus::first()
        ]);      
    }

    public function getForms(){
        foreach ($this->forms as $form) {
            if(!is_null(Auth::user()->$form)){
               $this->count += 1;
            }
          }
          $this->percentage = ($this->count/6) * 100;             
    
          $data = array(
            "count" => "",
            "percentage" => ""
          );
    
          $data["count"] = $this->count;
          $data["percentage"] = $this->percentage;

          return $data;
    }


}
