<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSubjectSched extends Component
{

    use WithPagination;


    public $courses;
    public $sections;

    public $search = '';

    public function mount(){
        $this->courses = Course::all();
        $this->sections = Section::all();
    }

    public function render()
    {
        return view('livewire.admin-subject-sched',[
            'fordisplay' => Subject::searchAdmin($this->search)->orderBy('section_id')->paginate(10)
        ]);
    }

    //Search
    public function updatingSearch(): void
    {
        $this->resetPage();
    }
}
