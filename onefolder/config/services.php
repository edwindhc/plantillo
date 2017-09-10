<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '', // Google Client ID.
        'client_secret' => '', // Google Client Secret.
        'redirect' => 'http://imgur.local/callback/google', // Only change `imgur.local` name to your domain.
    ],

	'facebook' => [
		'client_id' => '', // Facebook Client ID.
		'client_secret' => '', // Facebook Secret Token.
		'redirect' => 'http://imgur.local/callback/facebook',// Only change `imgur.local` name to your domain.
	],

	'twitter' => [
		'client_id' => '', // Twitter client ID
		'client_secret' => '', // Twitter Secret Token
		'redirect' => 'http://imgur.local/callback/twitter', // Only change `imgur.local` name to your domain.
	],

];
