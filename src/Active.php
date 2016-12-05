<?php

namespace Rukhsar\ActiveRoute;

class Active
{

    protected $currentRouteName;

    public function __construct($currentRouteName)
    {
        $this->currentRouteName  =  $currentRouteName;
    }

    public function route($routePattern)
    {
        // Convert to Array

        if (!is_array($routePattern))
        {
            $routePattern = explode(' ', $routePattern);
        }

        // Check the current route name

        foreach ((array) $routePattern as $i)
        {
            if (str_is($i, $this->currentRouteName))
            {
                return config('activeroute.class');
            }
        }
    }
}