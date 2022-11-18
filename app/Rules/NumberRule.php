<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumberRule implements Rule
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
       
      if(sizeof($_POST['number'])>10){
        return "Mobile Should be of 10 Digits";
      }
       
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The attribute number must be less than 10  .';
    }
}
