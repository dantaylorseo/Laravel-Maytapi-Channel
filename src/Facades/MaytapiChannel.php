<?php

namespace dantaylorseo\MaytapiChannel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Taylor, Daniel\MaytapiChannel\MaytapiChannel
 */
class MaytapiChannel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Taylor, Daniel\MaytapiChannel\MaytapiChannel::class;
    }
}
