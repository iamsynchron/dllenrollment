<?php

namespace App\Models\forms;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'extension',
        'birthday',
        'birthplace',
        'sex',
        'gender',
        'height',
        'weight',
    ];

    public function studentpersonalbelong(){
        return $this->belongsTo(User::class);
    }

}
