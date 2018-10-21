<?php
/**
 * Created by PhpStorm.
 * User: prakash lobo
 * Date: 10/12/2018
 * Time: 11:42 PM
 */

use Illuminate\Support\Facades\Validator;

Validator::extend(
    'valid_password',
    function ($attribute, $value, $parameters)
    {
        return preg_match('/^[a-zA-Z0-9!@#$%\/\^&\*\(\)\-_\+\=\|\[\]{}\\\\?\.,<>`\'":;]+$/u', $value);
    }
);

Validator::extend(
    'phone_number',
    function ($attribute, $value, $parameters)
    {
        return strlen(preg_replace('#^.*([0-9]{3})[^0-9]*([0-9]{3})[^0-9]*([0-9]{4})$#', '$1$2$3', $value)) == 10;
    },trans('validation.phone_number')
);