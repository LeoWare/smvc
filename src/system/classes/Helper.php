<?php
/**
 *
 */

namespace System;

/**
 * helper class
 */
class Helper
{
    /**
     * outputs a string in a <pre> tag, passing though htmlspecialchars
     *
     * @param string $string
     * @return boolean
     */
    public static function pre($data)
    {
        if(is_String($data) || is_numeric($data)) {
            echo "<pre>" . htmlspecialchars($data) . "</pre>";
        } else {
            echo "<pre>" . htmlspecialchars(print_r($data, true)) . "</pre>";
        }

        return true;
    }

    /**
     * redirect the browser. this function doesn't return
     *
     * @param string $location
     * @param int $http_code
     */
    public static function redirect($location = "/", $http_code = 302)
    {

        if(is_array($location)) {
            $location = implode($location);
        }
        header("Location: $location", true, (int) $http_code);
        exit();
    }

    /**
     * Given a URI string in the form 1/2/3, returns the URI components in an array
     *
     * @param string $uri
     * @return array
     */
    public function pathinfo($uri)
    {
        $parts = explode('/', $uri);
        foreach($parts as $index => $part) {
            if(empty($part)) {
                unset($parts[$index]);
            }
        }

        return $parts;
    }
}
