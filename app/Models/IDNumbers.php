<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class IDNumbers extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'code',
        'name',
        'type'
    ];

    public function studentid()
    {
       return $this->hasOne(User::class, 'personalid','id');
    }

    public static function search($search)
    {
            return empty($search) ? static::query()
            : static::where('id', 'like', '%'.$search.'%')
            ->orWhere('code', 'like', '%'.$search.'%')
            ->orWhere('name', 'like', '%'.$search.'%')
            ->orWhere('type', 'like', '%'.$search.'%');
    }


}
