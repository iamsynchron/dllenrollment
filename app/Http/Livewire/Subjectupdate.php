<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use App\Models\StudentCourse;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Models\User;
use App\Rules\SectionValidation;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Subjectupdate extends Component
{   

   use WithPagination;

    //Database Models;
    public $courses;
    public $sections;
    public $subjects;

    //Select list
    public $sectionlist = null;

    //Regular Models
    public $coursemodel = null;
    public $sectionmodel = null;
    public $studtypemodel = null;


    //Search
    public $search = '';
    public $type = '';

    public $units = 0;
    public $unitcount = 0;
    public $selectedsubjects = [];
    public $coursesvalidate;
    public $sectionvalidate;

    //Get Course and Subject for Update
    public $mycourse;
    public $mysubject;

    //Pagination
    public $currentPage = 1;
    public $pages = [
        1 => [
            'heading' => 'Course and Section (Update)',
            'subheading' => 'Update your Course and Section'
        ],
        2 => [
            'heading' => 'Subjects (Update)',
            'subheading' => 'Update your Subjects'
        ]
    ];

    public function mount(){
       $this->courses = Course::all();
       $this->sections = Section::all();
       $this->coursesvalidate = $this->courses->pluck('id', 'course_code');
       $this->sectionvalidate = $this->sections->pluck('id', 'section');
      // dd($this->courses->pluck( 'course_code', 'id'));
    }

    public function addPagenow(){

    //DATA VALIDATION
     
      $this->validate([
        'coursemodel' => ['required', Rule::in($this->coursesvalidate)],
        'sectionmodel' => ['required', Rule::in($this->sectionvalidate),new SectionValidation()],
        'studtypemodel' => 'required|in:1,2'
      ],
      [
        'coursemodel.required' => 'Course is required.',
        'sectionmodel.required' => 'Year and Section is required.',
        'studtypemodel.required' => 'This field is required.',
      ]);



       if($this->currentPage < 2){
            if($this->studtypemodel == '1'){
                $this->type = 'reg';
               $this->search = $this->sectionmodel;
            }
            elseif($this->studtypemodel == '2'){
                $this->type = '';
                $this->search = '';
            }
        $this->currentPage++;
       }
    }

    public function subPagenow(){
        if($this->currentPage > 1){
            $this->currentPage--;
        }
    }

    public function render()
    {
        return view('livewire.subjectstepper',[
            'courseslist' => $this->courses,
            'fordisplay' => Subject::search($this->search, $this->type)->orderBy('section_id')->paginate(10)
        ]); 
    }

    //Update Select
    public function updatedcoursemodel($course_id){
        $this->sectionlist = $this->sections->where('course_id', $course_id);  
        $this->sectionmodel = NULL;    
     }
 
     public function updatedsectionmodel($section_id){
         
     }
 
     public function updatedstudtypemodel($studtype_id){
         
     }
    
    public function addunits($units, $id){
        
        if(!in_array($id, $this->selectedsubjects)){
            $this->unitcount -= $units;
        }
        else{
            $this->unitcount += $units;
        }

        //$this->unitcount += $units;
    }

    //Search
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    //SAVE TO DATABASE
    public function submit()
    {
        if(!is_null($this->coursemodel) && !is_null($this->sectionmodel) ){
            if(!is_null($this->studtypemodel)){
                if($this->studtypemodel == '1'){
                    $this->validate([
                        'coursemodel' => ['required', Rule::in($this->coursesvalidate)],
                        'sectionmodel' => ['required', Rule::in($this->sectionvalidate),new SectionValidation()],
                        'studtypemodel' => 'required|in:1,2'
                      ],
                      [
                        'coursemodel.required' => 'Course is required.',
                        'sectionmodel.required' => 'Year and Section is required.',
                        'studtypemodel.required' => 'This field is required.',
                      ]);

                     
                      //Regular Database Transaction
                      try {
                      DB::transaction(function(){
                        //Section Initialize
                        $savesection = StudentCourse::where('user_id', auth()->user()->id)->first();
                        
                        $savesection->section_id = $this->sectionmodel;
                        $savesection->studtype = 'reg';

                        //Section Store
                        $savesection->save();
                                    
                        //Delete Subjects
                        StudentSubject::where('user_id', auth()->user()->id)->delete();

                        //Subject Initialize
                        $getsubjects = Subject::where('section_id', $this->sectionmodel)->get('id');
                        foreach ($getsubjects as $key) {
                            $savesubject = new StudentSubject([
                                'user_id' => auth()->user()->id,
                                'subject_id' => $key->id
                            ]);
                            $savesubject->save();
                        }
                        
                        session()->flash('message', 'Subject and Course updated successfully');

                        return redirect()->route('dashboard');
                      });       
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                            
                }
                elseif($this->studtypemodel == '2'){
                    if(count($this->selectedsubjects) > 0){
                        if(count($this->selectedsubjects) <= 10){
                            $this->validate([
                                'coursemodel' => ['required', Rule::in($this->coursesvalidate)],
                                'sectionmodel' => ['required', Rule::in($this->sectionvalidate),new SectionValidation()],
                                'studtypemodel' => 'required|in:1,2'
                              ],
                              [
                                'coursemodel.required' => 'Course is required.',
                                'sectionmodel.required' => 'Year and Section is required.',
                                'studtypemodel.required' => 'This field is required.',
                              ]);
    
                              //Irregular Database Transaction
                                try {
                                    DB::transaction(function(){
                                   //Section Initialize
                                    $savesection = StudentCourse::where('user_id', auth()->user()->id)->first();
                                    
                                    $savesection->section_id = $this->sectionmodel;
                                    $savesection->studtype = 'irreg';

                                    //Section Store
                                    $savesection->save();


                                    //Delete Subjects
                                    StudentSubject::where('user_id', auth()->user()->id)->delete();
                                    
                                    //Subject Initialize and Save
                                    foreach ($this->selectedsubjects as $key) {
                                        $savesubject = new StudentSubject([
                                            'user_id' => auth()->user()->id,
                                            'subject_id' => $key
                                        ]);
                                        $savesubject->save();
                                    }
                                    
                                    session()->flash('message', 'Subject and Course updated successfully');
                                    
                                    return redirect()->route('dashboard');
                                    });       
                                } catch (\Throwable $th) {
                                    throw $th;
                                }
                        }
                        else{
                            session()->flash('manysubject','Only 10 subjects per student is allowed'); 
                        }
                    }
                    else{
                        session()->flash('nosubject','Please select subjects from the table'); 
                    }
                }
                else{
                    session()->flash('notype','No Student Type Selected'); 
                }
            }
            else{
                session()->flash('noselected','No Student Type Selected');
            }
        }
        else{
            session()->flash('nocourse','No Course and Section');
        }
    }

    public function save(){
        
    }

}
