<?php

namespace App\Models\forms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mobilenumber',
        'telephonenumber',
        'res_street',
        'res_brgy',
        'res_city',
        'res_province',
        'res_zip',
        'is_permanent',
        'per_street',
        'per_brgy',
        'per_city',
        'per_province',
        'per_zip'
    ];

    public function contactbelong(){
        return $this->belongsTo(User::class);
    }
}
