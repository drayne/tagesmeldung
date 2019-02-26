<?php
/**
 * Created by PhpStorm.
 * User: vedran.bojicic
 * Date: 02.10.2018
 * Time: 11:38 AM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AdminNotify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'adminNotify';
    }
}