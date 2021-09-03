<?php

namespace App\Models\forms;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory, SoftDeletes;


  
    

    protected $fillable = [
        'father_isdeceased',
        'father_lname',
        'father_fname',
        'father_mname',
        'father_age',
        'father_occup',
        'father_address',
        'father_mobile',
        'mother_isdeceased',
        'mother_lname',
        'mother_fname',
        'mother_mname',
        'mother_age',
        'mother_occup',
        'mother_address',
        'mother_mobile',
        'guardianOption',
        'guardian_rel',
        'guardian_lname',
        'guardian_fname',
        'guardian_mname',
        'guardian_age',
        'guardian_occup',
        'guardian_address',
        'guardian_mobile'
    ];


    public function studentfamilybelong(){
        return $this->belongsTo(User::class);
    }
}
