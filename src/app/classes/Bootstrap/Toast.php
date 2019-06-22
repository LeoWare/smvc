<?php
/**
 * Bootstrap Toast class
 */

namespace App\Bootstrap;

/**
 * Bootstrap toas class
 */
class Toast
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function render($message = "")
    {
        if(!is_empty($message)) {
            $theMessage = $message;
        } else {
            $theMessage = $this->message;
        }

        $output = '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">';
    }
}
