<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $response = parent::handle($request, $next, $guards);
        if (
            $request->isMethod('GET')
            && !$request->ajax()
            && !$request->routeIs('workspace', 'review.*', 'team.*')
            && !auth()->user()->acceptedPPAndTOS())
        {
            $request->session()->flash('success', 'Please review your profile and fill in missing details if needed.');
            $request->session()->flash('back-url', $request->fullUrl());

            return redirect()->route('workspace', ['#profile']);
        }

        return $response;
    }
}
