<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_code',
        'course_desc'
    ];

    public function sections()
    {
        return $this->hasMany(Section::class, 'course_id');
    }

    public function getSubjects(){
        return $this->hasManyThrough(Subject::class, Section::class, 'course_id','section_id','id','id');
    }

}
