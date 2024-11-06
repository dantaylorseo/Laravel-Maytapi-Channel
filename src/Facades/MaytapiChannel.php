<?php

namespace dantaylorseo\MaytapiChannel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \dantaylorseo\MaytapiChannel\MaytapiChannel
 */
class MaytapiChannel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \dantaylorseo\MaytapiChannel\MaytapiChannel::class;
    }
}
