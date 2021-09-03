<?php

namespace App\Http\Livewire;

use App\Models\other\EnrollStatus;
use Livewire\Component;

class AdminEnrollSettings extends Component
{
    public $enrollmessage;
    public $enrollradio;

    public function render()
    {
        
        return view('livewire.admin-enroll-settings',[
            'enrollstat' => EnrollStatus::first()
        ]);
    }

    public function submit(){
        $this->validate([
            'enrollradio' =>  'required|in:open,warn,closed',
            'enrollmessage' => 'required|min:5',
          ],
          [
            'enrollradio.required' => 'Enrollment type is required.',
            'enrollmessage.required' => 'Message is required.'
          ]);

          $getData = EnrollStatus::first();
          $getData->status_message = $this->enrollmessage;
          $getData->status_type = $this->enrollradio;

          $getData->save();


          session()->flash('message', 'Enrollment Status updated successfully');
    }

}
