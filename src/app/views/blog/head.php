<!DOCTYPE html>
<html lang="en_US">
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <script src="/js/jquery-3.4.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }
        </style>
        <?php
            if(isset($heads)) {
                foreach($heads as $head) {
                    echo "$head\n";
                }
            }
        ?>
    </head>
    <body>
