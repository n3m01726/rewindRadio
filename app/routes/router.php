<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
    case '/' :
        require 'views/home.php';
        break;
    case '/charts' :
        require 'views/charts.php';
        break;
    case '/schedule' :
        require 'views/schedule.php';
        break;
    case '/shows' :
        if (preg_match('/^\/shows\/([0-9]+)$/', $request, $matches)) {
            $id = $matches[1];
            require 'views/shows.php';
        } else {
            http_response_code(404);
            require 'views/404.php';
        }
        break;
    case '/post' :
        if (preg_match('/^\/post\/([0-9]+)$/', $request, $matches)) {
            $id = $matches[1];
            require 'views/post.php';
        } else {
            http_response_code(404);
            require 'views/404.php';
        }
        break;
    default:
        http_response_code(404);
        require 'views/404.php';
        break;
}

?>