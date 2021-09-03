<?php

namespace App\Models\forms;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolTwo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'seniorSchool',
        'seniorStrand',
        'seniorAttended',
        'seniorGraduated',
        'seniorHonor',
        'vocationalCheck',
        'vocationalSchool',
        'vocationalCourse',
        'vocationalOptiongrad',
        'vocationalUnits',
        'vocationalAttended',
        'vocationalGraduated',
        'vocationalHonor',
        'collegeCheck',
        'collegeSchool',
        'collegeCourse',
        'collegeOptiongrad',
        'collegeUnits',
        'collegeAttended',
        'collegeGraduated',
        'collegeHonor',
        'transferCheck',
        'transferSchool',
        'transferCourse',
        'transferUnits',
        'transferAttended',
        'transferGraduated'
    ];

    public function studentschoolotwobelong(){
        return $this->belongsTo(User::class);
    }


}
