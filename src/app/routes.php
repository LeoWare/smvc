<?php
/**
 * This file initializes the routes
 */

$route = new \System\Routes\Router();

$route->add('GET', '/',    '\App\Controllers\Home');
$route->add('GET', 'home', '\App\Controllers\Home');
$route->add('GET', 'blog', '\App\Controllers\BlogController');
$route->add('GET', 'blog/posts', array('\App\Controllers\BlogController', 'posts_page'));

