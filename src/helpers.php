<?php

if (!function_exists('active_route'))
{
    function active_route($routePattern, $class = 'active')
    {
        return app('active')->route($routePattern, $class);
    }
}