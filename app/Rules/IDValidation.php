<?php

namespace App\Rules;

use App\Models\IDNumbers;
use Illuminate\Contracts\Validation\Rule;

class IDValidation implements Rule
{
    protected $idnumber;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($idnumber)
    {
        $this->idnumber = $idnumber;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $verified = IDNumbers::where('id', $this->idnumber)->where('code', $value)->first();
        
        if(is_null($verified)){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid Verification Code';
    }
}
