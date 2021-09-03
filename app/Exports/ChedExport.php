<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use PDO;

class ChedExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query()->with('studentpersonal', 'studentadditional', 'studentToSection', 'studentToSubject')->whereHas('studentformstatus' ,function($q){
            return $q->whereNotNull('form1')
            ->whereNotNull('form2')
            ->whereNotNull('form3')
            ->whereNotNull('form4')
            ->whereNotNull('form5')
            ->whereNotNull('form6')
            ->whereNotNull('section')
            ->whereNotNull('signature');
        })->where('users.user_role', 3);
    }

    public function headings():array{
        return[
            'ID Number',
            'Lastname',
            'Firstname',
            'Middlename',
            'Suffix',
            'Sex',
            'Nationality',
            'Year Level',
            'Course'
        ];
    }


    public function map($info): array
    {
        $return = [];
        if($info->studentpersonal->sex == 1){
            $info->studentpersonal->sex = 'M';
        }
        elseif($info->studentpersonal->sex == 2){
            $info->studentpersonal->sex = 'F';
        }

        $return[0] = $info->personalid;
        $return[1] = strtoupper($info->studentpersonal->lastname);
        $return[2] = strtoupper($info->studentpersonal->firstname);
        $return[3] = strtoupper($info->studentpersonal->middlename);
        $return[4] = $info->studentpersonal->extension;
        $return[5] = $info->studentpersonal->sex;
        $return[6] = strtoupper($info->studentadditional->citizenship);
        $return[7] = $info->studentToSection->first()->section;
        $return[8] = $this->getCourse($info->studentToSection->first()->course_id);
        $loops = 8;
        foreach($info->studentToSubject as $subject) {
            $return[$loops+=1] = $subject->subject_code;
            $return[$loops+=1] = $subject->subject_desc;
            $return[$loops+=1] = $subject->subject_units;
        }
        return $return;
    }


    public function getCourse($courseid){
        switch ($courseid) {
            case 1:
        return  'BACHELOR OF SCIENCE IN ENGLISH LANGUAGE STUDIES';
                break;
            case 2:
        return  'BACHELOR OF SCIENCE IN ACCOUNTANCY';
                break;
            case 3:
        return  'BACHELOR OF SCIENCE IN ACCOUNTING INFORMATION SYSTEM';
                break;
            case 4:
        return  'BACHELOR OF SCIENCE IN ENTREPRENEURSHIP';
                break;
            case 5:
        return  'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY';
                break;
            case 6:
        return  'BACHELOR OF SCIENCE IN PUBLIC ADMINISTRATION';
                break;
            case 7:
        return  'BACHELOR OF SCIENCE IN SOCIAL WORK';
                break;
            case 8:
        return  'BACHELOR IN TECHNOCAL VOCATIONAL TEACHER EDUCATION';
                break;
            case 9:
        return  'DIPLOMA IN HOTEL AND RESTAURANT SERVICES';
                break;                   
            default:
        return  'ERROR';
                break;
        }
    }

    
}
