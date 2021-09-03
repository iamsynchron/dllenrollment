<?php

namespace App\Models;

use App\Models\forms\Additional;
use App\Models\forms\Contact;
use App\Models\forms\Family;
use App\Models\forms\Personal;
use App\Models\forms\SchoolOne;
use App\Models\forms\SchoolTwo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'personalid',
        'email',
        'password',
        'user_role',
        'email_verified_at'
    ];

    protected $dates = ['deleted_at'];  

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //Relationships

    //Student to Personal Info
    public function studentpersonal(){
        return $this->hasOne(Personal::class);
    }

    //Student to Contact
    public function studentcontact(){
        return $this->hasOne(Contact::class);
    }

    //Student to Family
    public function studentfamily(){
        return $this->hasOne(Family::class);
    }

    //Student to Additional
    public function studentadditional(){
        return $this->hasOne(Additional::class);
    }

    //Student to SchoolOne
    public function studentschoolone(){
        return $this->hasOne(SchoolOne::class);
    }

    //Student to SchoolTwo
    public function studentschooltwo(){
        return $this->hasOne(SchoolTwo::class);
    }

    //Student to Signature
    public function studentsignature(){
        return $this->hasOne(Signature::class);
    }

     //Student to FOrmStatus
     public function studentformstatus(){
        return $this->hasOne(FormsStatus::class);
    }

    //Subject of Students
    public function studentToSubject(){
        return $this->belongsToMany(Subject::class, 'student_subjects', 'user_id', 'subject_id');
    }

    //Section of Students
    public function studentToSection(){
        return $this->belongsToMany(Section::class, 'student_courses', 'user_id', 'section_id')
                    ->withPivot(['studtype']);
    }

    public function studentToIDNumber(){
        return $this->belongsTo(IDNumbers::class,'personalid');
    }


    public static function search($search)
    {
        
            return empty($search) ? static::query()
            : static::where('personalid', 'like', '%'.$search.'%')
            ->orWhereHas('studentpersonal', function ($query) use($search) {
                $query->where('lastname',  'like', '%'.$search.'%')
                ->orWhere('firstname',  'like', '%'.$search.'%')
                ->orWhere('middlename',  'like', '%'.$search.'%');
            });
   

    }

    public static function searchID($search)
    {
        
            return empty($search) ? static::query()
            : static::where('personalid', 'like', '%'.$search.'%')
            ->orWhereHas('studentToIDNumber', function ($query) use($search) {
                $query->where('name',  'like', '%'.$search.'%');
            });
   

    }


}
