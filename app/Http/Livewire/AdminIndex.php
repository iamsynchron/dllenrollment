<?php

namespace App\Http\Livewire;

use App\Models\IDNumbers;
use App\Models\User;
use Livewire\Component;

class AdminIndex extends Component
{
    public $getData;
    
    public function render()
    {
        // $allstudent = User::with('studentformstatus','studentToIDNumber', 'studentpersonal', 'studentToSection')->whereHas('studentformstatus' ,function($q){
        //     return $q->whereNotNull('form1')
        //     ->whereNotNull('form2')
        //     ->whereNotNull('form3')
        //     ->whereNotNull('form4')
        //     ->whereNotNull('form5')
        //     ->whereNotNull('form6')
        //     ->whereNotNull('section')
        //     ->whereNotNull('signature');
        // })->where('user_role', 3)->get();
        // dd($allstudent->pluck('studentToSection')->flatten()->filter(function ($item){
        //     return preg_match("/1/",$item['section']);
        // })->all());



      $this->getData = User::with('studentformstatus','studentToIDNumber')->where('user_role', 3)->get();
        return view('livewire.admin-index',[
            'enrolled' => $this->getData->
                            whereIn('studentformstatus.form1', 1)->
                            whereIn('studentformstatus.form2', 1)->
                            whereIn('studentformstatus.form3', 1)->
                            whereIn('studentformstatus.form4', 1)->
                            whereIn('studentformstatus.form5', 1)->
                            whereIn('studentformstatus.form6', 1)->
                            whereIn('studentformstatus.section', 1)->
                            whereIn('studentformstatus.signature', 1)->all(),
            'dropped' => User::where('user_role', 3)->onlyTrashed()->get('id')->all(),
            'newstudents' => $this->getData->
                            whereIn('studentformstatus.form1', 1)->
                            whereIn('studentformstatus.form2', 1)->
                            whereIn('studentformstatus.form3', 1)->
                            whereIn('studentformstatus.form4', 1)->
                            whereIn('studentformstatus.form5', 1)->
                            whereIn('studentformstatus.form6', 1)->
                            whereIn('studentformstatus.section', 1)->
                            whereIn('studentformstatus.signature', 1)->
                            Where('studentToIDNumber.type','!=',2)->all(),
            'oldstudents' => $this->getData->
                            whereIn('studentformstatus.form1', 1)->
                            whereIn('studentformstatus.form2', 1)->
                            whereIn('studentformstatus.form3', 1)->
                            whereIn('studentformstatus.form4', 1)->
                            whereIn('studentformstatus.form5', 1)->
                            whereIn('studentformstatus.form6', 1)->
                            whereIn('studentformstatus.section', 1)->
                            whereIn('studentformstatus.signature', 1)->
                            where('studentToIDNumber.type','!=',1)->
                            Where('studentToIDNumber.type','!=',3)->
                            Where('studentToIDNumber.type','!=',4)->all(),


            'incomplete' => User::with('studentformstatus','studentToIDNumber')->whereHas('studentformstatus' ,function($q){
                return $q->whereNull('form1')
                ->orWhereNull('form2')
                ->orWhereNull('form3')
                ->orWhereNull('form4')
                ->orWhereNull('form5')
                ->orWhereNull('form6')
                ->orWhereNull('section')
                ->orWhereNull('signature');
            })->where('user_role', 3)->get() 
        ]);
    }
}
