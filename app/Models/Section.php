<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'semester_id',
        'section'
    ];

    public function coursebelong(){
        return $this->belongsTo(Course::class,'course_id', 'id');
    }

    public function sembelong(){
        return $this->belongsTo(Semester::class,'semester_id', 'id');
    }
    

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    //Subject of Students
    public function sectionToStudent(){
        return $this->belongsToMany(User::class, 'student_courses', 'section_id', 'user_id')
        ->withPivot(['studtype']);
    }

}
