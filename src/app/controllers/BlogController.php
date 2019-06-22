<?php
/**
 * This file contains the base Controller class
 */

namespace App\Controllers;

use System\Helper as Helper;

/**
 * The base Controller class
 */
class BlogController extends \System\Controller
{
    public function __construct()
    {

    }

    public function index($args)
    {

        global $db;

        $user = new \App\Models\User($db);

        var_dump($args);
        return $this->_renderHTML();

    }

    /**
     * return a post
     * GET /post/<post_id>
     */
    public function post($args = array())
    {
        global $db;
        // if(is_array($args)) {
        //     if(count($args) == 1) {
        //         $args = $args[0];
        //     }
        // }
        // make sure the arguemnt is a number
        if(is_numeric($args[0])) {
            $posts = new \App\Models\Blog\Post($db);
            $post = $posts->getById($args[0]);
        }

        $postData = array(
            "post_title" => $post->title,
            "post_date" => $post->published,
            "author_name" => $post->author,
            "post_body" => $post->text
        );

        $view = new \System\View();
        $posts = $view->load(
            "blog/post",
            $postData
        );

        return $this->_renderHTML(array(
            "posts" => $posts,
            "feature" => ""
        ));
    }

    private function _renderHTML($user_content = array())
    {
        // output the blog post index page
        $view = new \System\View();

        $content['page_title'] = "Blog";

        $content['navbar'] = $view->load("blog/navbar");
        $content['feature'] = $view->load("blog/featured");

        $content = array_merge($content, $user_content);


        $content['header'] = $view->load(
            "blog/header",
            array(
                "navbar" => $content['navbar'],
                "feature" => $content['feature']
            )
        );


        // $content['posts'] = $view->load("blog/main");

        $output = $view->load(
            "blog/index",
            $content
        );

       //die(var_dump($content));

        // die($output);
        echo $output;
        return true;
    }
}
