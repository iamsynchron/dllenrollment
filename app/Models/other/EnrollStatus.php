<?php

namespace App\Models\other;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_message',
        'status_type'
    ];


}
