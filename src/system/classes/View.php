<?php
/**
 * This file contains the base View class
 */

namespace System;

/**
 * This class represents a view
 */
class View
{
    /**
     *
     */
    private $content;

    /**
     *
     */
    public function __construct($content = "")
    {
        $this->content = $content;
        return $this;
    }

    /**
     * sets the view content
     *
     * @param string $content
     * @return View
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * appends content to the existing view content
     *
     * @param string $content
     * @return View
     */
    public function appendContent($content)
    {
        $this->content .= $content;
        return $this;
    }

    /**
     * load content from a view file and return it as a string
     */
    public function load($file, $data = array())
    {
        $content = "";

        // does the file exist?
        if(file_exists(VIEWS_PATH . $file . ".php")) {
            //echo(VIEWS_PATH . $file . ".php");
            // start an output buffer
            ob_start();
            // extract the data array into this context
            extract($data);
            // include the file as php

            include(VIEWS_PATH . $file . ".php");
            // get the content
            $content = ob_get_clean();

        }

        return $content;
    }

    /**
     * load content from a view and append it to this view content
     */
    public function append($file, $data = array())
    {
        $content = $this->load($file, $data);
        $this->appendContent($content);
    }


    /**
     * returns the view output
     *
     * @param array $data Optional
     * @return string
     */
    public function render($emit = true)
    {
        if($emit)
            echo $this->content;
        return $this;
    }
}
