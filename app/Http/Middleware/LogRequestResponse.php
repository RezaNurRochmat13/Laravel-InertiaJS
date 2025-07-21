<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRequestResponse
{
    public function handle($request, Closure $next)
    {
        $start = microtime(true);
        $method = $request->getMethod();
        $path = $request->getPathInfo();
        $controllerAction = optional($request->route())->getActionName();
        $userId = optional($request->user())->id;

        Log::info("➡️ {$method} {$path} [{$controllerAction}] by user_id={$userId}");
        Log::info("📦 Request: ", $request->all());

        $response = $next($request);

        $duration = round((microtime(true) - $start) * 1000, 2);
        Log::info("✅ Response: {$response->status()} in {$duration} ms");

        return $response;
    }
}
