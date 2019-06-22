<?php
/**
 * This file contains the Router class
 */

namespace System\Routes;

/**
 * This class routes a request to the correct controller
 */
class Router
{
    private $request;
    private $routes;

    /**
     *
     */
    public function __construct()
    {
        $this->request = false;
        $this->routes = new \System\Routes\RouteCollection();
    }

    public function add($method, $route, $controller)
    {
        $tempRoute = new \System\Routes\Route($method, $route, $controller);
        $this->routes->add($tempRoute);


        return $this;
    }

    public function getByRoute($route)
    {
        return $this->routes->getByRoute($route);
    }

    public function getRoutesArray()
    {
        return $this->routes->getRoutesArray();
    }

    /**
     * Routes a request to a controller
     *
     * @param \System\Request $request
     * @return boolean
     */
    public function route(\System\Request $request)
    {
        $pathinfo = $request->pathInfo();

        if(count($pathinfo) == 0) {
            // No route was passed. use the default route
            // get the default route
            $route = $this->routes->getByRoute("/");
            // is there a default route set?
            if(is_null($route)) {
                throw new \Exception("No default route set.");
            }
            return $this->dispatch($route->getController(), "index", array());
        }

        // has the route been registered?
        $route = $this->routes->getByRoute(array_shift($pathinfo));
        if($route == null) {
            return false;
        }

        // get the controller name
        $controller = $route->getController();
        // is there something in the second position?
        if(count($pathinfo)) {
            $method = array_shift($pathinfo);
        } else {
            $method = "index";
        }
        //die("$controller - $method - $pathinfo");
        if($this->dispatch($controller, $method, $pathinfo)) {
            return true;
        }

        array_unshift($pathinfo, $method);
        if($this->dispatch($controller, 'index', $pathinfo) ) {
           return true;
        }

        // no controller found
        return false;
    }

    public function dispatch($controller, $method, $args)
    {

        // try to find a method in the class
        if(!method_exists($controller, $method)) {
            return false;
        }

        $tempController = new $controller();

        // start collecting the output
        ob_start();

        // call the function
        $tempController->$method($args);

        // get the content
        $content = ob_get_clean();

        echo $content;

        return true;
    }
}
