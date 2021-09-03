<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;


class AdminAnnouncement extends Component
{
    use WithPagination;

    //Search
    public $search = '';
    public $confirming;

    
    public function render()
    {
        return view('livewire.admin-announcement',[
            'announcements' => Announcement::search($this->search)->paginate(5)
        ]);
    }

    //Search
    public function updatingSearch(): void
    {
        $this->resetPage();
    }


    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Announcement::destroy($id);
    }
}


