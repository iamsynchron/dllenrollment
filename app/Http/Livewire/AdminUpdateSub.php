<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUpdateSub extends Component
{
    use WithPagination;


    public $search = '';
    public $type = '';

     public $myid;
     public $units = 0;
     public $unitcount = 0;
     public $selectedsubjects = [];



    public function mount($subid = null){
        $this->myid = $subid;
    }

    public function render()
    {
        return view('livewire.admin-update-sub', [
            'student' =>User::find($this->myid),
            'fordisplay' => Subject::search($this->search, $this->type)->orderBy('section_id')->paginate(10),
            'courseslist' => Course::all(),
            'sectionlist' => Section::all(),
            
        ])->layout('layouts.admin2');
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


    //Back
    public function backPage(){
        return redirect()->route('subjects');
    }

    public function submit()
    {
        if(count($this->selectedsubjects) > 0){
            if(count($this->selectedsubjects) <= 10){

                  //Irregular Database Transaction
                    try {
                        DB::transaction(function(){
                        //Delete Subjects
                        StudentSubject::where('user_id', $this->myid)->delete();
                        
                        //Subject Initialize and Save
                        foreach ($this->selectedsubjects as $key) {
                            $savesubject = new StudentSubject([
                                'user_id' => $this->myid,
                                'subject_id' => $key
                            ]);
                            $savesubject->save();
                        }
                        
                        session()->flash('message', 'Subject updated successfully');
                        
                        return redirect()->route('subjects');
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

}
