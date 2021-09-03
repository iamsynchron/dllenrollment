<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CourseGenderCount extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $allstudent = User::with('studentformstatus','studentToIDNumber', 'studentpersonal', 'studentToSection')->whereHas('studentformstatus' ,function($q){
            return $q->whereNotNull('form1')
            ->whereNotNull('form2')
            ->whereNotNull('form3')
            ->whereNotNull('form4')
            ->whereNotNull('form5')
            ->whereNotNull('form6')
            ->whereNotNull('section')
            ->whereNotNull('signature');
        })->where('user_role', 3)->get();

        //Total Male
        $total_abels_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 1)->all();
        $total_bsa_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 2)->all();
        $total_bsais_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 3)->all();
        $total_bse_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 4)->all();
        $total_bsit_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 5)->all();
        $total_bspa_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 6)->all();
        $total_bssw_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 7)->all();
        $total_btvte_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 8)->all();
        $total_dhrs_male = $allstudent->where('studentpersonal.sex', 1)->pluck('studentToSection')->flatten()->where('course_id', 9)->all();

         //Total Female
         $total_abels_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 1)->all();
         $total_bsa_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 2)->all();
         $total_bsais_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 3)->all();
         $total_bse_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 4)->all();
         $total_bsit_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 5)->all();
         $total_bspa_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 6)->all();
         $total_bssw_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 7)->all();
         $total_btvte_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 8)->all();
         $total_dhrs_female = $allstudent->where('studentpersonal.sex', 2)->pluck('studentToSection')->flatten()->where('course_id', 9)->all();
        
        return Chartisan::build()
        ->labels(['ABELS', 'BSA', 'BSAIS', 'BSE', 'BSIT', 'BSPA', 'BSSW', 'BTVTE', 'DHRS'])
        ->dataset('Male', [count($total_abels_male), count($total_bsa_male), count($total_bsais_male), count($total_bse_male), count($total_bsit_male), count($total_bspa_male), count($total_bssw_male), count($total_btvte_male), count($total_dhrs_male)])
        ->dataset('Female', [count($total_abels_female), count($total_bsa_female), count($total_bsais_female), count($total_bse_female), count($total_bsit_female), count($total_bspa_female), count($total_bssw_female), count($total_btvte_female), count($total_dhrs_female)]);
    }
}