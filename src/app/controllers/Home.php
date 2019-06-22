<?php
/**
 * This file contains the base Controller class
 */

namespace App\Controllers;

use \System\Helper;

/**
 * The base Controller class
 */
class Home extends \System\Controller
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index($args)
    {
        global $db;

        if(count($args)){
            show_404();
        }

        $view = new \System\View();
        $view->append("home/index");

        $view->render();
    }

    /**
     *
     */
    public function view($args)
    {
        ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <header class="mb-4">
<?php
        $navbar = new \App\Bootstrap\Navbar();

        $item = new \App\Bootstrap\NavbarItem("/blog", "Blog");
        $navbar->addItem($item);
        $item2 = new \App\Bootstrap\NavbarItem("/projects", "Projects");
        $navbar->addItem($item2);
        //$navbar->addItem(new \App\Bootstrap\NavbarItem("/home"));

        $navbar->setBrand("Code Library")->setExpand("small")->setTheme("dark");

        echo $navbar->render("/projects");
?>
    </header>
    <section id="main" class="container-fluid">
        <div class="row">
            <div class="col-3 col-xl-1">
                <aside class="sidebar border border-primary rounded">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                      </li>
                    </ul>
                </aside>
            </div>
            <div class="col-8 col-xl-10 border border-dark rounded" style="min-height: 400px;">
                Content Here.
            </div>
        </div>
    </section>
<?php
        echo '<div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

        Helper::pre(print_r($navbar, true));

        //Helper::pre(print_r($navbar->getItems(), true));

        $items = $navbar->getItems();
        Helper::pre(count($navbar));
        //Helper::pre($items);
        $navbar->removeItem($item2);
        //$navbar->removeItemByIndex(0);
        Helper::pre(print_r($navbar, true));

        $array_object = new \ArrayObject();
        Helper::pre(print_r($array_object, true));

        ?>
</body>
</html>

        <?php
    }
}
