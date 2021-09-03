<?php

namespace App\Models\forms;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Additional extends Model
{
    use HasFactory, SoftDeletes;

            protected $fillable = [
                'insuranceOption',
                'insurance_lname',
                'insurance_fname',
                'insurance_mname',
                'insurance_address',
                'insurance_mobile',
                'civilstatus',
                'citizenship',
                'religion',
                'specialOption',
                'specialdisability',
                'indigenousRadio',
                'indigenousminority'
            ];
        
            public function studentadditionalbelong(){
                return $this->belongsTo(User::class);
            }
}
