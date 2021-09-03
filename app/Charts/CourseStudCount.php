<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class CourseStudCount extends BaseChart
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

        //Total
        $total_abels = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 1)->all();
        $total_bsa = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 2)->all();
        $total_bsais = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 3)->all();
        $total_bse = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 4)->all();
        $total_bsit = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 5)->all();
        $total_bspa = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 6)->all();
        $total_bssw = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 7)->all();
        $total_btvte = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 8)->all();
        $total_dhrs = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 9)->all();

        //First Year
        $total_abels1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 1)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bsa1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 2)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bsais1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 3)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bse1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 4)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bsit1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 5)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bspa1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 6)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_bssw1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 7)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_btvte1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 8)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();
        $total_dhrs1 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 9)->filter(function ($item){
            return preg_match("/1/",$item['section']);
        })->all();


        //Second Year
        $total_abels2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 1)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bsa2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 2)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bsais2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 3)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bse2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 4)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bsit2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 5)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bspa2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 6)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_bssw2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 7)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_btvte2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 8)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();
        $total_dhrs2 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 9)->filter(function ($item){
            return preg_match("/2/",$item['section']);
        })->all();


        //Third Year
        $total_abels3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 1)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bsa3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 2)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bsais3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 3)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bse3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 4)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bsit3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 5)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bspa3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 6)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_bssw3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 7)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_btvte3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 8)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();
        $total_dhrs3 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 9)->filter(function ($item){
            return preg_match("/3/",$item['section']);
        })->all();


        //Fourth Year
        $total_abels4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 1)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bsa4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 2)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bsais4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 3)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bse4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 4)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bsit4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 5)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bspa4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 6)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_bssw4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 7)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_btvte4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 8)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();
        $total_dhrs4 = $allstudent->pluck('studentToSection')->flatten()->where('course_id', 9)->filter(function ($item){
            return preg_match("/4/",$item['section']);
        })->all();

        return Chartisan::build()
            ->labels(['ABELS', 'BSA', 'BSAIS', 'BSE', 'BSIT', 'BSPA', 'BSSW', 'BTVTE', 'DHRS'])
            ->dataset('Total', [count($total_abels), count($total_bsa), count($total_bsais), count($total_bse), count($total_bsit), count($total_bspa), count($total_bssw), count($total_btvte), count($total_dhrs)])
            ->dataset('First Year', [count($total_abels1), count($total_bsa1), count($total_bsais1), count($total_bse1), count($total_bsit1), count($total_bspa1), count($total_bssw1), count($total_btvte1), count($total_dhrs1)])
            ->dataset('Second Year', [count($total_abels2), count($total_bsa2), count($total_bsais2), count($total_bse2), count($total_bsit2), count($total_bspa2), count($total_bssw2), count($total_btvte2), count($total_dhrs2)])
            ->dataset('Third Year', [count($total_abels3), count($total_bsa3), count($total_bsais3), count($total_bse3), count($total_bsit3), count($total_bspa3), count($total_bssw3), count($total_btvte3), count($total_dhrs3)])
            ->dataset('Fourth Year', [count($total_abels4), count($total_bsa4), count($total_bsais4), count($total_bse4), count($total_bsit4), count($total_bspa4), count($total_bssw4), count($total_btvte4), count($total_dhrs4)]);
    }
}