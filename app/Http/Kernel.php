<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \App\Http\Middleware\LogLastUserActivity::class,
        ],
        'admin' =>[
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\IsUserAdmin::class,

        ],

       
        'seller' =>[
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\IsSeller::class,

        ],


        'sellerOut' =>[
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\IsSellerOut::class,

        ],


        'store' =>[
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\IsStore::class,

        ],

         'accountant' =>[
            \App\Http\Middleware\Authenticate::class,
            \App\Http\Middleware\ISAccountant::class,

        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
