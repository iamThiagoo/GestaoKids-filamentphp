<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array<int,class-string>
     */
    protected $middleware = [
        \Bilfeldt\LaravelRouteStatistics\Http\Middleware\RouteStatisticsMiddleware::class,
    ];
}
