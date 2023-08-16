<?php

namespace RenatoXM\PostmarkWebhooks\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class PostmarkIpsWhitelist
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (collect(config('postmark-webhooks.allowlist-ips'))->contains($request->getClientIp())) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
