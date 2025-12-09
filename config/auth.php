<?php

return [

    'defaults' => [
        'guard' => 'customer',
        'passwords' => 'customers',
    ],

    'guards' => [

        // Default Laravel guard for web (required)
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Admin guard
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        // Agen guard
        'agen' => [
            'driver' => 'session',
            'provider' => 'agens',
        ],

        // Customer guard
        'customer' => [
            'driver' => 'session',
            'provider' => 'customers',
        ],
    ],

    'providers' => [

        // Default Laravel provider (keep it even if unused)
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'agens' => [
            'driver' => 'eloquent',
            'model' => App\Models\Agen::class,
        ],

        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],
    ],

    'passwords' => [

        'customers' => [
            'provider' => 'customers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
