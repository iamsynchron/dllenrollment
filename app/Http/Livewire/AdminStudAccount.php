<?php

namespace App\Http\Livewire;

use App\Models\IDNumbers;
use App\Exports\IDNumberExport;
use Livewire\Component;
use Livewire\WithPagination;
use Excel;

class AdminStudAccount extends Component
{

    use WithPagination;

    
    public $search = '';

    public function render()
    {
        return view('livewire.admin-stud-account',[
            'accounts' => IDNumbers::search($this->search)->where('type', '!=', 5)->paginate(15)
        ]);
    }

    //Search
    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function downloadExcel(){
        return Excel::download(new IDNumberExport, 'IDList.xlsx');
    }
}
