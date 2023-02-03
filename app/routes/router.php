<?php
require '../vendor/autoload.php';
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/charts', 'charts', 'charts');
$router->map('GET', '/schedule', 'schedule', 'schedule');
$router->map('GET', '/events', 'events', 'events');
$router->map('GET', '/videos', 'videos', 'videos');
$router->map('GET', '/team', 'teams', 'team');
$router->map('GET', '/benevolat', 'benevolat', 'benevolat');
$router->map('GET', '/privacy', 'privacy-policy', 'privacy-policy');
$router->map('GET', '/posts/[i:id]', 'single_post', 'article');
$router->map('GET', '/shows/[i:id_subcat]', 'single_show', 'single_show');
$router->map('GET', '/profile/[i:id]', 'profile', 'profile');

$match = $router->match();