<?php
/**
 * This file contains the base Model class
 */

namespace System;

/**
 * The base Model class
 */
class Model
{

    /**
     *
     */
    public function __construct()
    {

    }

    public function __get($key)
    {
        die($this);
    }

    public function __set($key, $value)
    {

    }

    public function __toString()
    {
        return __CLASS__;
    }
}
