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
        // cloudflare support
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $this->save($_SERVER['HTTP_CF_CONNECTING_IP']);
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $this->save($_SERVER['REMOTE_ADDR']);
        }
    }

    /**
     * Try to save IP into DB.
     *
     * @param  string $ip
     * @return mixed
     */
    private function save($ip)
    {
        try {
            DB::statement('INSERT INTO `els_ip_logs` (`ip_address`) VALUES (INET6_ATON(?))',
                [$ip]);
        } catch (\Exception $e) {
            // sorry not this time
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