<?php
/**
 * Bootstrap navbar item
 */

namespace App\Bootstrap;

/**
 * Bootstrap navbar item
 */
class NavbarItem
{
    private $uri;
    private $title;
    private $attributes;

    /**
     * constructor
     *
     * @param string $uri
     * @param string $title
     * @param array $attributes
     *
     * @return NabarItem
     */
    public function __construct($uri, $title = "", $attributes = array())
    {
        $this->uri = $uri;
        $this->title = $title;
        $this->attributes = $attributes;
    }

    public function __get($property)
    {
        if(property_exists(NavbarItem::class, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if(property_exists(NavbarItem::class, $property)) {
            $this->$property = $value;
        }
    }

    public function __toString()
    {
        return $this->uri;
    }
}
