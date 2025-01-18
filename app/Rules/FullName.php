<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class FullName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //public function passes($attribute, $value)
    {
        if(!preg_match('/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/', $value)){
           $fail('Enter Valid Name');
        }
    }
    }
}
