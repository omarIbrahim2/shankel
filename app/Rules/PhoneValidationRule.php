<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
        
        if (strlen($value) > 7 || strlen($value) < 7) {
            
            return false;
        }

        if (preg_match("/[a-z]/i", $value)) {
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
        return trans('validation.CPone');
    }
}
