<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class AjaxRequestOnlyMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed|void
     */
    public function handle($request, Closure $next)
    {
        if ($request->ajax() || isBot($_SERVER['HTTP_USER_AGENT'])) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN, 'Not Allowed Ajax Call');
    }
}
