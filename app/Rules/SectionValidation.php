<?php

namespace App\Rules;

use App\Models\Section;
use Illuminate\Contracts\Validation\Rule;

class SectionValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $studentsnumber = count(Section::whereHas('sectionToStudent', function ($query) use($value) {
            $query->where('sections.id', $value);
                 })->get());
        
        if(is_null($studentsnumber)){
            return true;
        }

        if($studentsnumber >= 50){
            return false;
        }
        else{
            return true;
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
        return 'Sorry, this section had already reached 50 student. Please select another section.';
    }
}
