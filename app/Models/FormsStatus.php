<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormsStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'form1',
        'form2',
        'form3',
        'form4',
        'form5',
        'form6',
        'section',
        'signature'
    ];

}
