<?php
/**
 * This file contains the Tools utility class
 */

namespace System;
/**
 * Tools utility class
 */
class Tools
{
    /**
     * outputs a string in a <pre> tag, passing though htmlspecialchars
     *
     * @param string $string
     * @return boolean
     */
    public function pre(string $string)
    {
       echo "<pre>" . htmlspecialchars($string) . "</pre>";
       return true;
    }

    /**
     * returns the URI components in an array
     *
     * @param string $uri
     * @return array
     */
    public function pathinfo($uri)
    {
        $parts = explode('/', $uri);
        if(empty($parts[0])) {
            array_shift($parts);
        }
        return $parts;
    }
}
