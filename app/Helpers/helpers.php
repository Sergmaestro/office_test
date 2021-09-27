<?php

use Illuminate\Routing\Route;

if (!function_exists( 'getRoutesList'))
{
    function getRoutesList($prefix = null, array $namesList = [])
    {
        $routes = collect(\Route::getRoutes())
            ->keyBy(function (Route $route) {
                return $route->getName();
            });

        if ($prefix) {
            if (!is_array($prefix)) {
                $prefix = [$prefix];
            }

            $routes = $routes->filter(function ($item) use ($prefix) {
                $routePrefix = !empty($item->action['prefix']) ? $item->action['prefix'] : false;

                return $routePrefix && in_array(ltrim($routePrefix, '/'), $prefix);
            });
        }

        // Create a list of named routes that should be mapped
        if (is_array($namesList) && count($namesList)) {
            $namesArray = [];

            if (is_array($prefix)) {
                foreach ($prefix as $pref) {
                    $groupedNamesArray = array_map(function ($item) use ($pref) {
                        return $pref ? "{$pref}.{$item}" : $item;
                    }, $namesList);

                    $namesArray = array_merge($namesArray, $groupedNamesArray);
                }
            } else {
                $namesArray = array_map(function ($item) use ($prefix) {
                    return $prefix ? "{$prefix}.{$item}" : $item;
                }, $namesList);
            }

            $routes = $routes->whereIn('action.as', $namesArray);
        }

        return $routes->mapWithKeys(function ($route) {
            return [$route->getName() => $route->uri()];
        })->all();

    }
}
