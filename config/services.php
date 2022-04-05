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

    'google' => [
      'client_id' => ' google app cient id',
      'client_secret' => 'google app client secret',
      'redirect' => 'https://skillxcelence.test/login/facebook/callback',
    ],
    'facebook' => [
      'client_id' => '267773660852661',
      'client_secret' => '8c96c2550f115fb7e0f4f78669718ae4',
      'redirect' => 'https://skillxcelence.test/login/facebook/callback',
    ],
    'twitter' => [
      'client_id' => ' twitter app cient id',
      'client_secret' => 'twitter app client secret',
      'redirect' => 'https://skillxcelence.test/login/facebook/callback',
    ],
    'linkedin' => [
      'client_id' => ' linkedin app cient id',
      'client_secret' => 'linkedin app client secret',
      'redirect' => 'https://skillxcelence.test/login/facebook/callback',
    ],
];
