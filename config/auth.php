<?php


use App\Providers\RouteServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'custom' => [
        'parent'=>[
            'model' => App\Models\Parentt::class,
            "url" => 'parent-profile',
        ], 
        
        'school' => [
           'model' => App\Models\School::class,
           'url' => 'school-profile',
        ],
        'teacher' => [
             'model' => App\Models\Teacher::class,
             'url' => 'teacher-profile',
        ],
        'supplier'=>[
            'model' => App\Models\Supplier::class,
            'url' => 'supplier-profile',
        ],
        'web' => [
            'model' => App\Models\User::class,
             'url'  => 'dashboard',
          ],
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
            
        ],

        'parent' => [
            'driver' => 'session',
            'provider' => 'parentts',
        ],

        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],

        'school' => [
            'driver' => 'session',
            'provider' => 'schools',
        ],

        'supplier' =>[
            'driver' => 'session',
            'provider' => 'suppliers',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'parentts' => [
            'driver' => 'eloquent',
            'model' => App\Models\Parentt::class,
        ],

        'teachers' => [
            'driver' => 'eloquent',
             'model' => App\Models\Teacher::class,
        ],

        'schools' => [
            'driver' => 'eloquent',
             'model' => App\Models\School::class,
        ],

        'suppliers' => [
            'driver'=> 'eloquent',
            'model' => App\Models\Supplier::class,
        ]


    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'url' =>'admin-login'
        ],
        'parents' => [
            'provider' => 'parentts',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'url' => 'parent-login'
        ],
        'teachers' => [
            'provider' => 'teachers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'url'=>'teacher-login',
        ],
        'schools' => [
            'provider' => 'schools',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'url' => 'school-login'
        ],

        'suppliers' => [
            'provider' => 'suppliers',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
            'url' => 'supplier-login'

        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
