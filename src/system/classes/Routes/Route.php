<?php
/*
 * This class represents a MVC Route
 */

namespace System\Routes;

/**
 * represents an HTTP request route
 */
class Route
{
    private $method;
    private $route;
    private $controller;

    public function __construct($method = "GET", $route = "/", $controller = "\System\Controller")
    {
        $this->setMethod($method);
        $this->setRoute($route);
        $this->setController($controller);
    }

    public function getMethod()
    {
        return $this->method;
    }


    public function setMethod($value)
    {
        $this->method = $value;
    }

    public function getRoute()
    {
        return $this->route;
    }


    public function setRoute($value)
    {
        $this->route = $value;
    }

    public function getController()
    {
        return $this->controller;
    }


    public function setController($value)
    {
        $this->controller = $value;
    }

    // public function __get($key)
    // {
    //     if(property_exists(__CLASS__, $key)) {
    //         return $this->$key;
    //     }
    // }

    // public function __set($key, $value)
    // {
    //     //die(var_dump(array($key, $value)));
    //     if(property_exists(__CLASS__, $key)) {
    //         $this->$key = $value;
    //     }
    // }
}
