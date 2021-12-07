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
        'client_id' => '551496269488-rs0m042e7nufc77tfb5cqsbvlcdgcsru.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

    'github' => [
        'client_id' => '3449255d6ddc5d54d787',
        'client_secret' => '20a9347dcf07e6b1f117793220c5262a4615b1d5',
        'redirect' => 'http://127.0.0.1:8000/callback/github',
    ],

];
