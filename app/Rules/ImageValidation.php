<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageValidation implements Rule
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
       // Check if there are valid base64 characters
    if (!preg_match('/^[a-zA-Z0-9\/\r\n+]*={0,2}$/', $value)) return true;

    // Decode the string in strict mode and check the results
    $decoded = base64_decode($value, true);
    if(false === $decoded) return true;

    // Encode the string again
    if(base64_encode($decoded) != $value) return true;

    return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This is not a valid signature';
    }
}
