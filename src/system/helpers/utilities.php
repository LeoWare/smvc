<?php

/**
 * show a 404 page.
 */
function show_404()
{
    header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
    echo <<< "EOF"
        <html>
        <head>
            <meta charset="UTF-8">
            <title>404 Not Found</title>
        </head>
        <body>
            <h1>Not found</h1>
            <p>The requested page could not be found</p>
        </body>
        </html>
EOF;
    exit();
}

