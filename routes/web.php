<?php
require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

$router->map('GET', '/', 'home', 'home');
$router->map('GET', '/charts', 'charts', 'charts');
$router->map('GET', '/schedule', 'schedule', 'schedule');
$router->map('GET', '/team', 'team', 'team');
$router->map('GET', '/benevolat', 'benevolat', 'benevolat');
$router->map('GET', '/privacy-policy', 'privacy-policy', 'privacy-policy');
// $router->map('GET', '/[*:slug]', 'single_page', 'single_page');

$router->map('GET', '/posts/[i:id]', 'single_post', 'single_post');
$router->map('GET', '/shows/[i:id]', 'single_show', 'single_show');
$router->map('GET', '/profile/[i:id]', 'profile', 'profile');

$router->map('POST', '/login', 'private/login', 'login');
$router->map('GET', '/post-add', 'private/post-add', 'post-add');
$router->map('GET', '/post-edit/[i:id]', 'private/post-edit', 'post-edit');
$router->map('POST', '/post-send', 'private/post-send', 'post-send');
$router->map('POST', '/post-update/[i:id]', 'private/post-update', 'post-update');
$router->map('GET', '/user-add', 'private/user-add', 'user-add');
$router->map('GET', '/user-list', 'private/user-list', 'user-list');
$router->map('GET', '/post-list', 'private/post-list', 'post-list');
$router->map('GET', '/settings', 'private/settings', 'settings');
$router->map('GET', '/logout', 'private/logout', 'logout');
$router->map('GET', '/add-draft', 'private/add-draft', 'add-draft');
$router->map('GET', '/view-draft', 'private/view-draft', 'view-drafts');

$match = $router->match();
