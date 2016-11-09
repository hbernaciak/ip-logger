<?php

namespace Hbernaciak\IpLogger;

use Closure;
use DB;

/**
 * Class IpLoggerMiddleware
 * @package Hbernaciak\ipLogger
 */
class IpLoggerMiddleware
{
    /**
     * FirewallMiddleware constructor.
     */
    public function __construct()
    {
        if (isset($_SERVER['REMOTE_ADDR'])) {
            try {
                DB::statement('INSERT INTO `els_ip_logs` (`ip_address`) VALUES (INET6_ATON(?))',
                    [$_SERVER['REMOTE_ADDR']]);
            } catch (\Exception $e) {
                // sorry not this time
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}