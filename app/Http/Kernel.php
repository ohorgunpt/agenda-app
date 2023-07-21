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
     * @var array<int, class-string|string>
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'superadmin' => \App\Http\Middleware\SuperAdmin::class,
        'sestama' => \App\Http\Middleware\Sestama::class,
        'tusestama' => \App\Http\Middleware\TuSestama::class,
        'irtama' => \App\Http\Middleware\Irtama::class,
        'deputi1' => \App\Http\Middleware\Deputi1::class,
        'deputi2' => \App\Http\Middleware\Deputi2::class,
        'deputi3' => \App\Http\Middleware\Deputi3::class,
        'deputi4' => \App\Http\Middleware\Deputi4::class,
        'tukepala' => \App\Http\Middleware\TuKepala::class,
        'protokol' => \App\Http\Middleware\Protokol::class,
        'tuirtama' => \App\Http\Middleware\tuirtama::class,
        'tudeputi1' => \App\Http\Middleware\tudeputi1::class,
        'tudeputi2' => \App\Http\Middleware\tudeputi2::class,
        'tudeputi3' => \App\Http\Middleware\tudeputi3::class,
        'tudeputi4' => \App\Http\Middleware\tudeputi4::class,
        'dsp' => \App\Http\Middleware\DSP::class,
        'humas' => \App\Http\Middleware\Humas::class,
        'kepalabpom' => \App\Http\Middleware\KepalaBPOM::class,
    ];
}
