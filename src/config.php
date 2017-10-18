<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default SMS driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default SMS driver user.
    |
    | Supported: "log", "null", "nexmo", "clockwork"
    |
    */

    'default' => env('SMS_DRIVER', 'log'),

    /*
    |--------------------------------------------------------------------------
    | Drivers
    |--------------------------------------------------------------------------
    |
    | Here you can define the settings for each driver. 
    |
    */

    'drivers' => [

        'clockwork' => [
            'driver' => 'clockwork',
            'api_key' => env('CLOCKWORK_API_KEY', null),
        ],

        'log' => [
            'driver' => 'log',
        ],

        'requestbin' => [
            'path' => env('REQUESTBIN_PATH', null),
        ],

        'nexmo' => [
            'driver' => 'nexmo',
            'api_key' => env('NEXMO_API_KEY', null),
            'api_secret' => env('NEXMO_API_secret', null),
        ],

        'null' => [
            'driver' => 'null',
        ],
    ],
];
