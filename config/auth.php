<?php

return [

    'defaults' => [
        'guard' => 'vicidial_users',
        'passwords' => 'vicidial_users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'vicidial_users',
        ],
        'api' => [
            'driver' => 'sanctum',
            'provider' => 'vicidial_users',
            'hash' => false,
        ],
        'vicidial_users' => [ // Define the 'vicidial_users' guard here
            'driver' => 'session',
            'provider' => 'vicidial_users',
        ],
    ],

    'providers' => [
        'vicidial_users' => [
            'driver' => 'eloquent',
            'model' => App\Models\vicidialUser::class,
        ],
    ],

    'passwords' => [
        'vicidial_users' => [
            'provider' => 'vicidial_users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
