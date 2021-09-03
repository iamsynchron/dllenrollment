<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'subject_teacher',
        'subject_code',
        'subject_desc',
        'subject_units',
        'subject_from',
        'subject_to',
        'subject_day',
        'subject_room',
        'section_id'
    ];


    public function subjectbelong()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function getCourses(){
        return $this->hasOneThrough(Course::class, Section::class, 'course_id','id','section_id','id');
    }

     //Subject of Students
     public function subjectToStudent(){
        return $this->belongsToMany(User::class, 'student_subjects', 'subject_id', 'user_id');
    }


   
    public static function search($search, $type)
    {
        if($type == 'reg'){
            return empty($search) ? static::query()
            : static::where('section_id', $search);
        }
        else{
            return empty($search) ? static::query()
            : static::where('section_id', $search)
            ->orWhere('subject_code', 'like', '%'.$search.'%')
            ->orWhere('subject_desc', 'like', '%'.$search.'%')
            ->orWhere('subject_from', 'like', '%'.$search.'%')
            ->orWhere('subject_to', 'like', '%'.$search.'%')
            ->orWhere('subject_day', 'like', '%'.$search.'%')
            ->orWhere('subject_teacher', 'like', '%'.$search.'%')
            ->orWhereHas('subjectbelong', function ($query) use($search) {
                $query->where('section',  'like', '%'.$search.'%')
                    ->orWhereHas('coursebelong', function ($query2) use($search) {
                    $query2->where('courses.course_code', 'like', '%'.$search.'%')
                    ->orWhere('courses.course_desc', 'like', '%'.$search.'%');
                });
            });
        }

    }

    public static function searchAdmin($search)
    {
        
            return empty($search) ? static::query()
            : static::where('section_id', $search)
            ->orWhere('subject_code', 'like', '%'.$search.'%')
            ->orWhere('subject_desc', 'like', '%'.$search.'%')
            ->orWhere('subject_from', 'like', '%'.$search.'%')
            ->orWhere('subject_to', 'like', '%'.$search.'%')
            ->orWhere('subject_day', 'like', '%'.$search.'%')
            ->orWhere('subject_teacher', 'like', '%'.$search.'%')
            ->orWhereHas('subjectbelong', function ($query) use($search) {
                $query->where('section',  'like', '%'.$search.'%')
                    ->orWhereHas('coursebelong', function ($query2) use($search) {
                    $query2->where('courses.course_code', 'like', '%'.$search.'%')
                    ->orWhere('courses.course_desc', 'like', '%'.$search.'%');
                });
            });
   

    }
}


// where($field, 'like', '%'.$search.'%');
