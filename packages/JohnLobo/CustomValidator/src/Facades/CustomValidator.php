<?php

namespace JohnLobo\CustomValidator\Facades;

use Illuminate\Support\Facades\Facade;

class CustomValidator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'customvalidator';
    }
}
