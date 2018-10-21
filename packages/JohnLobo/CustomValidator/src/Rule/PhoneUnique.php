<?php
/**
 * Created by PhpStorm.
 * User: prakash lobo
 * Date: 10/12/2018
 * Time: 10:01 PM
 */

namespace JohnLobo\CustomValidator\Rule;


use Illuminate\Contracts\Validation\Rule;

class PhoneUnique implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value=="23525232"?"":'Wrong Validated Processe';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Phone ui message";
    }
}