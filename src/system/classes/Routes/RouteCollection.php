<?php
/**
 * This file contains the Router class
 */

namespace System\Routes;

/**
 * This class routes a request to the correct controller
 */
class RouteCollection
{

    private $routes;

    public function __construct()
    {
        $this->routes = array();
    }

    public function add(Route $route)
    {
        if(is_null($route)) {
            return $this;
        }

        if(!key_exists($route->getRoute(), $this->routes)) {
            $this->routes[$route->getRoute()] = $route;
        }

        return $this;
    }

    public function remove(Route $route)
    {
        if(key_exists($route->getRoute(), $this->routes)) {
            unset($this->routes[$routes->getRoute()]);
        }

        return $this;
    }

    public function getByRoute(string $route)
    {
        if(key_exists($route, $this->routes)) {
            return $this->routes[$route];
        }

        return null;
    }

    public function getRoutesArray()
    {
        return $this->routes;
    }


}
