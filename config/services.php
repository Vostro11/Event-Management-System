<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => 'sandbox2d631ba105454095b305c2c3d2a023af.mailgun.org',
        'secret' => '5b2ac217ac7349f0a06494611481db97',
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => '25b73237a3c40a949045c341478ba54d8ae8e0f8',
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => env('F_CID'),
        'client_secret' => env('F_CS'),
        'redirect' => env('F_CBU'),
    ],
    'google' => [
        'client_id' => env('G_CID'),
        'client_secret' => env('G_CS'),
        'redirect' => env('G_CBU'),
    ],

    'nexmo' => [
    'key' => env('NEXMO_KEY'),
    'secret' => env('NEXMO_SECRET'),
    'sms_from' => '15556666666',
],

];
