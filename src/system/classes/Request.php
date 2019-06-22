<?php
/**
 * This file contains the Request class
 */

namespace System;

/**
 * This class represents the HTTP request
 */
class Request
{
    private $server_vars;

    public function __construct($server_vars)
    {
        $this->server_vars = $server_vars;
    }

    /**
     * returns the URI components in an array
     *
     * @param string $uri
     * @return array
     */
    public function pathinfo()
    {
        $parts = explode('/', @$this->server_vars['REDIRECT_URL']);
        foreach($parts as $index => $part) {
            if(empty($part)) {
                unset($parts[$index]);
            }
        }

        return $parts;
    }

    /**
     * returns the query string components in an array
     *
     * @param string $uri
     * @return array
     */
    public function queryString()
    {
        $parts = explode('/', $uri);
        if(empty($parts[0])) {
            array_shift($parts);
        }
        return $parts;
    }


    public function __toString()
    {
        return print_r($this->server_vars, true);
    }
}
