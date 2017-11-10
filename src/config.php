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

        'textlocal' => [
            'driver' => 'textlocal',
            'api_key' => env('TEXTLOCAL_API_KEY', null),
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

        'twilio' => [
            'driver' => 'twilio',
            'account_id' => env('TWILIO_ACCOUNT_ID', null),
            'api_token' => env('TWILIO_API_TOKEN', null),
        ],

        'aws' => [
            'driver' => 'aws',
            'api_key' => env('AWS_SNS_API_KEY', null),
            'api_secret' => env('AWS_SNS_API_SECRET', null),
            'api_region' => env('AWS_SNS_API_REGION', null),
        ],

        'mail' => [
            'domain' => env('MAIL_SMS_DOMAIN', null),
        ],

        'null' => [
            'driver' => 'null',
        ],
    ],
];
