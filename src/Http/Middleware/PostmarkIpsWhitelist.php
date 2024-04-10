<?php

namespace RenatoXM\PostmarkWebhooks\Http\Middleware;

use Closure;

class PostmarkIpsWhitelist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('postmark-webhooks.disable-middleware')) {
            return $next($request);
        } else {
            if (collect(config('postmark-webhooks.allowlist-ips'))->contains($request->getClientIp())) {
                return $next($request);
            }

            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
