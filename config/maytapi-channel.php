<?php

// config for dantaylorseo/MaytapiChannel
return [
    'api_key' => env('MAYTAPI_API_KEY'),
    'product_id' => env('MAYTAPI_PRODUCT_ID'),
    'phone_id' => env('MAYTAPI_PHONE_ID'),
    'send_to_channel' => env('MAYTAPI_SEND_TO_CHANNEL', false),
    'group_id' => env('MAYTAPI_GROUP_ID'),
];
