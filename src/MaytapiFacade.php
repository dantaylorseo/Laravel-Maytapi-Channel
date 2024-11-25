<?php
namespace dantaylorseo\MaytapiChannel;

use Illuminate\Support\Facades\Facade;

class MaytapiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'maytapi';
    }
}
