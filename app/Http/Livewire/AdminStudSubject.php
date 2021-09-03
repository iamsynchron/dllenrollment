<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStudSubject extends Component
{

    use WithPagination;

    public $studID = null;

    public $search = '';

    public function render()
    {
        return view('livewire.admin-stud-subject',[
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


    public function showSubject($id){
        $this->studID = $id;
        $this->emit('showSub');
    }

    public function editSubject($id){
       // $this->emit('updateSub', $id);
        redirect()->route('changesubjects', ['subid' => $id]);
    }
}
