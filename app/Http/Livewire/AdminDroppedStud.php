<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Livewire\Component;

class AdminDroppedStud extends Component
{
    public $search = '';
    public $confirming;

    public function render()
    {
        return view('livewire.admin-dropped-stud',[
            'subjects' => User::search($this->search)->with('studentToSubject','studentpersonal', 'studentToSection')->onlyTrashed()->where('users.user_role', 3)->paginate(10),
            'courses' => Course::all(),
            'sections' => Section::all()
        ]);
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
    }

}
