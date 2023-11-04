<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('user', static function ($routes) {
    $routes->get('(:any)', 'User::user/$1');
});

// $routes->group('profile', static function ($routes) {
//     $routes->get('/', 'Profile::index');
// });

$routes->get('profile', 'Profile::index');
$routes->post('profile', 'Profile::update');

$routes->get('home', 'Dashboard::index');
$routes->post('post', 'Postingan::insert');

$routes->post('comment/(:num)', 'Comment::insert/$1');
$routes->get('search', 'Search::index');

$routes->get('post/(:num)', 'Postingan::detail/$1');
$routes->delete('post/(:num)', 'Postingan::delete/$1');
