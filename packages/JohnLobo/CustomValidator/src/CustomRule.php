<?php
/**
 * Created by PhpStorm.
 * User: prakash lobo
 * Date: 10/12/2018
 * Time: 9:04 PM
 */

namespace JohnLobo\CustomValidator;


use Illuminate\Contracts\Validation\Rule;

class CustomRule implements Rule
{
    /**
     * CustomRule constructor.
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
       // print_r($value);
      //  print_r($attribute);
        //return strtoupper($value) === $value;
       // return strlen($value) === 5;
        return $value > 10;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       return trans('validation.uppercase');
        return " :attribute :value validation.uppercase";
    }
}