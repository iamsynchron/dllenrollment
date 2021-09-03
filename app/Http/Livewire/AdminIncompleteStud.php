<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminIncompleteStud extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.admin-incomplete-stud', [
            'subjects' => User::searchID($this->search)->with('studentformstatus', 'studentToIDNumber')->whereHas('studentformstatus' ,function($q){
                return $q->whereNull('form1')
                ->orWhereNull('form2')
                ->orWhereNull('form3')
                ->orWhereNull('form4')
                ->orWhereNull('form5')
                ->orWhereNull('form6')
                ->orWhereNull('section')
                ->orWhereNull('signature');
            })->where('users.user_role', 3)->paginate(10),
        ]);
    }
}
