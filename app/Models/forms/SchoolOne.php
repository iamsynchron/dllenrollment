<?php

namespace App\Models\forms;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolOne extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lrn',
        'elemSchool',
        'elemAttended',
        'elemGraduated',
        'elemHonor',
        'juniorSchool',
        'juniorAttended',
        'juniorGraduated',
        'juniorHonor'
    ];

    public function studentschoolonebelong(){
        return $this->belongsTo(User::class);
    }

}
