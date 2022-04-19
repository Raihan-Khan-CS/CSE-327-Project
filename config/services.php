<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // 'facebook' => [
    //     'client_id' => '489218352253782',
    //     'client_secret' => '1bd3304604aa9229551fb65756a2c8e9',
    //     'redirect' => 'http://localhost/osudlagbe/callback/facebook',
    //   ],
      'facebook' => [
        'client_id' => '489218352253782',
        'client_secret' => '1bd3304604aa9229551fb65756a2c8e9',
        'redirect' => 'https://localhost/osudlagbe/callback/facebook',
      ],

    'google' => [
        'client_id' => '824461248348-kr0q7csj7os32tkfjiar2ostscei61uc.apps.googleusercontent.com',
        'client_secret' => 'oU8lY99HCI1If0X7iGvliUVM',
        'redirect' => 'http://localhost/osudlagbe/callback/google',
       ],

       'github' => [
        'client_id' => 'ed36b090057d8887c593',
        'client_secret' => 'b0bdd119d2b55b848a360c9d847253e444717768',
        'redirect' => 'http://localhost/osudlagbe/callback/github',
      ],
];
