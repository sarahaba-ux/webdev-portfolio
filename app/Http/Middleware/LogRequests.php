<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Prepare log entry
        $logEntry = sprintf(
            "[%s] %s %s\n",
            now()->toDateTimeString(),
            $request->method(),
            $request->fullUrl()
        );

        // Log to log.txt
        file_put_contents(storage_path('logs/log.txt'), $logEntry, FILE_APPEND);

        return $next($request);
    }
}
