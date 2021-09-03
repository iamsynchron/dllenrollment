<?php

namespace App\Http\Livewire;

use App\Exports\ChedExport;
use App\Exports\MISExport;
use App\Models\User;
use Livewire\Component;
use Excel;

class AdminExcelReport extends Component
{
    public function render()
    {
        $sample = User::with('studentpersonal', 'studentadditional', 'studentToSection', 'studentToSubject')->whereHas('studentformstatus' ,function($q){
            return $q->whereNotNull('form1')
            ->whereNotNull('form2')
            ->whereNotNull('form3')
            ->whereNotNull('form4')
            ->whereNotNull('form5')
            ->whereNotNull('form6')
            ->whereNotNull('section')
            ->whereNotNull('signature');
        })->where('users.user_role', 3)->get();
       // dd($sample);

        return view('livewire.admin-excel-report');
    }

    public function downloadChed(){
        return Excel::download(new ChedExport, 'CHED Report.xlsx');
    }

    public function downloadMIS(){
        return Excel::download(new MISExport, 'ALL MIS.xlsx');
    }
}
