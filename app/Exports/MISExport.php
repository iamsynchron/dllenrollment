<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMapping;
use PDO;

class MISExport implements FromQuery, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query()->with('studentpersonal', 'studentcontact', 'studentfamily', 'studentadditional', 'studentschoolone', 'studentschooltwo', 'studentToSection', 'studentToSubject')->whereHas('studentformstatus' ,function($q){
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
            'LRN',
            'Lastname',
            'Firstname',
            'Middle Initial',
            'Suffix',
            'Sex',
            'Birthday',
            'Degree Program',
            'Year Level',
            'Section',
            'Email',
            'Phone Number',
            'Middlename',
            'Place of Birth',
            'Height',
            'Weight',
            'Special Y/N',
            'Disability',
            'Indigenous Y/N',
            'Minority Group',
            'Res Street',
            'Res Brgy',
            'Res City',
            'Res Province',
            'Res Zip',
            'Per Street',
            'Per Brgy',
            'Per City',
            'Per Province',
            'Per Zip',
            'Civil Status',
            'Religion',
            'Citizenship',
            'Telephone',
            'Father Lastname',
            'Father Firstname',
            'Father Middlename',
            'Father Occupation',
            'Father Address',
            'Father Contact',
            'Mother Lastname',
            'Mother Firstname',
            'Mother Middlename',
            'Mother Occupation',
            'Mother Address',
            'Mother Contact',
            'Guardian Relation',
            'Guardian Lastname',
            'Guardian Firstname',
            'Guardian Middlename',
            'Guardian Occupation',
            'Guardian Address',
            'Guardian Contact',
            'Elem School',
            'Elem From',
            'Elem To',
            'Elem Grad',
            'Elem Honor',
            'Junior School',
            'Junior From',
            'Junior To',
            'Junior Grad',
            'Junior Honor',
            'Senior School',
            'Senior Strand',
            'Senior From',
            'Senior To',
            'Senior Grad',
            'Senior Honor',
            'Vocational School',
            'Vocational Course',
            'Vocational From',
            'Vocational To/Graduated',
            'Vocational Units',
            'Vocational Graduated',
            'Vocational Honors',
            'College School',
            'College Course',
            'College From',
            'College To/Graduated',
            'College Units',
            'College Graduated',
            'College Honors',
            'Transfer School',
            'Transfer Course',
            'Transfer Units',
            'Transfer Attended',
            'Year of Transfer'
            
        ];
    }


    public function map($info): array
    {
        
        if($info->studentpersonal->sex == 1){
            $info->studentpersonal->sex = 'M';
        }
        elseif($info->studentpersonal->sex == 2){
            $info->studentpersonal->sex = 'F';
        }

        if($info->studentadditional->specialOption == 1){
            $info->studentadditional->specialOption = 'Yes';
        }else{
            $info->studentadditional->specialOption = 'No';
            $info->studentadditional->specialdisability = 'none';
        }

        if($info->studentadditional->indigenousRadio == 1){
            $info->studentadditional->indigenousRadio = 'Yes';
        }
        else{
            $info->studentadditional->indigenousRadio = 'No';
            $info->studentadditional->indigenousminority = 'none';
        }

        if($info->studentcontact->is_permanent = 1){
            $info->studentcontact->per_street = 'same';
            $info->studentcontact->per_brgy = 'same';
            $info->studentcontact->per_city = 'same';
            $info->studentcontact->per_province = 'same';
            $info->studentcontact->per_zip = 'same';
        }

        if($info->studentfamily->father_isdeceased == 1){
            $info->studentfamily->father_occup = 'Deceased';
        }

        if($info->studentfamily->mother_isdeceased == 1){
            $info->studentfamily->mother_occup = 'Deceased';
        }


        if($info->studentfamily->guardianOption == 1){
            $info->studentfamily->guardian_rel = 'Father';
        }
        elseif($info->studentfamily->guardianOption == 2){
            $info->studentfamily->guardian_rel = 'Mother';
        }

        if($info->studentschooltwo->vocationalOptiongrad == 1){
            $info->studentschooltwo->vocationalOptiongrad = 'Yes';
        }
        elseif($info->studentschooltwo->vocationalOptiongrad == 2){
            $info->studentschooltwo->vocationalOptiongrad = 'No';
        }

        if($info->studentschooltwo->collegeOptiongrad == 1){
            $info->studentschooltwo->collegeOptiongrad = 'Yes';
        }
        elseif($info->studentschooltwo->collegeOptiongrad == 2){
            $info->studentschooltwo->collegeOptiongrad = 'No';
        }

        return[
            $info->personalid,
            $info->studentschoolone->lrn,
            strtoupper($info->studentpersonal->lastname),
            strtoupper($info->studentpersonal->firstname),
            strtoupper($info->studentpersonal->middlename),
            $info->studentpersonal->extension,
            $info->studentpersonal->sex,
            $info->studentpersonal->birthday,
            $this->getCourse($info->studentToSection->first()->course_id),
            $info->studentToSection->first()->section,
            $info->studentToSection->first()->section,
            $info->email,
            $info->studentcontact->mobilenumber,
            strtoupper($info->studentpersonal->middlename),
            $info->studentpersonal->birthplace,
            $info->studentpersonal->height,
            $info->studentpersonal->weight,
            $info->studentadditional->specialOption,
            $info->studentadditional->specialdisability,
            $info->studentadditional->indigenousRadio,
            $info->studentadditional->indigenousminority,
            $info->studentcontact->res_street,
            $info->studentcontact->res_brgy,
            $info->studentcontact->res_city,
            $info->studentcontact->res_province,
            $info->studentcontact->res_zip,
            $info->studentcontact->per_street,
            $info->studentcontact->per_brgy,
            $info->studentcontact->per_city,
            $info->studentcontact->per_province,
            $info->studentcontact->per_zip,
            $info->studentadditional->civilstatus,
            $info->studentadditional->religion,
            $info->studentadditional->citizenship,
            $info->studentcontact->telephonenumber,
            $info->studentfamily->father_lname,
            $info->studentfamily->father_fname,
            $info->studentfamily->father_mname,
            $info->studentfamily->father_occup,
            $info->studentfamily->father_address,
            $info->studentfamily->father_mobile,
            $info->studentfamily->mother_lname,
            $info->studentfamily->mother_fname,
            $info->studentfamily->mother_mname,
            $info->studentfamily->mother_occup,
            $info->studentfamily->mother_address,
            $info->studentfamily->mother_mobile,
            $info->studentfamily->guardian_rel,
            $info->studentfamily->guardian_lname,
            $info->studentfamily->guardian_fname,
            $info->studentfamily->guardian_mname,
            $info->studentfamily->guardian_occup,
            $info->studentfamily->guardian_address,
            $info->studentfamily->guardian_mobile,
            $info->studentschoolone->elemSchool,
            $info->studentschoolone->elemAttended,
            $info->studentschoolone->elemGraduated,
            $info->studentschoolone->elemGraduated,
            $info->studentschoolone->elemHonor,
            $info->studentschoolone->juniorSchool,
            $info->studentschoolone->juniorAttended,
            $info->studentschoolone->juniorGraduated,
            $info->studentschoolone->juniorGraduated,
            $info->studentschoolone->juniorHonor,
            $info->studentschooltwo->seniorSchool,
            $this->shsstrand($info->studentschooltwo->seniorStrand),
            $info->studentschooltwo->seniorAttended,
            $info->studentschooltwo->seniorGraduated,
            $info->studentschooltwo->seniorGraduated,
            $info->studentschooltwo->seniorHonor,
            $info->studentschooltwo->vocationalSchool,
            $info->studentschooltwo->vocationalCourse,
            $info->studentschooltwo->vocationalAttended,
            $info->studentschooltwo->vocationalGraduated,
            $info->studentschooltwo->vocationalUnits,
            $info->studentschooltwo->vocationalOptiongrad,
            $info->studentschooltwo->vocationalHonor,
            $info->studentschooltwo->collegeSchool,
            $info->studentschooltwo->collegeCourse,
            $info->studentschooltwo->collegeAttended,
            $info->studentschooltwo->collegeGraduated,
            $info->studentschooltwo->collegeUnits,
            $info->studentschooltwo->collegeOptiongrad,
            $info->studentschooltwo->collegeHonor,
            $info->studentschooltwo->transferSchool,
            $info->studentschooltwo->transferCourse,
            $info->studentschooltwo->transferUnits,
            $info->studentschooltwo->transferAttended,
            $info->studentschooltwo->transferTransferred,
        ];
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


    public function shsstrand($strandid){
        switch ($strandid) {
            case 'ABM':
        return  'Accountancy, Business, and Management (ABM)';
                break;
            case 'HUMMS':
        return  'Humanities and Social Sciences (HUMSS)';
                break;
            case 'STEM':
        return  'Science, Technology, Engineering, and Mathematics (STEM)';
                break;
            case 'GAS':
        return  'General Academic Strand (GAS)';
                break;
            case 'TVL-Agri':
        return  'Agri-Fishery Arts';
                break;
            case 'TVL-HomeEcon':
        return  'Home Economics';
                break;
            case 'TVL-ICT':
        return  'Information and Communications Technology (ICT)';
                break;
            case 'TVL-Industrial':
        return  'Industrial Arts';
                break;
            case 'Sports':
        return  'Sports Track';
                break; 
            case 'Arts':
        return  'Arts and Design';
                break;                       
            default:
        return  'ERROR';
                break;
        }
    }


}
