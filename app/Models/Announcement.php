<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table='announcements';
    public $timestamps = true;

    protected $fillable = [
        'author',
        'position',
        'title',
        'body',
        'announcement_type',
    ];

    public static function search($search)
    {
        
            return empty($search) ? static::query()
            : static::where('author', 'like', '%'.$search.'%')
            ->orWhere('position', 'like', '%'.$search.'%')
            ->orWhere('title', 'like', '%'.$search.'%')
            ->orWhere('body', 'like', '%'.$search.'%')
            ->orWhere('announcement_type', 'like', '%'.$search.'%');

    }

}
