<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckDeceased implements Rule
{
    protected $mother;
    protected $father;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($mother, $father)
    {
        $this->mother = $mother;
        $this->father = $father;
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
        if(!$this->mother && !$this->father ){
            return true;
        }
        else{
            if($value == "1"){
                if($this->father == "1"){ 
                    return false;
                }
                else{
                    return true;
                }
            }
            elseif($value == "2"){
                if($this->mother == "1"){
                    return false;
                }
                else{
                    return true;
                }
            }
            elseif($value == "3"){
                return true;
            }
        }
        

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please select another guardian option.';
    }
}
