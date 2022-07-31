<?php

use Root\Autoloader;
use Root\Routes\Router;
use Root\App\Exceptions\NotFoundException;

include("../Autoloader.php");
Autoloader::register();
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('RACINE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);
define('FILES', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR);

session_start();
session_regenerate_id();
$routes = new Router($_SERVER['REQUEST_URI']);

$routes->get("/login", "Root\App\Controllers\AdminController@login");
$routes->post("/login", "Root\App\Controllers\AdminController@__login");
$routes->get("/logout", "Root\App\Controllers\AdminController@logout");

$routes->get("/dashboard", "Root\App\Controllers\AdminController@dashboard");
$routes->get("/users/current", "Root\App\Controllers\AdminController@profile");
$routes->get("/users", "Root\App\Controllers\AdminController@users");
$routes->get("/users/new", "Root\App\Controllers\AdminController@new_user");
$routes->post("/users/new", "Root\App\Controllers\AdminController@_new_user");
$routes->get("/users/delete/([a-zA-Z0-9]*)", "Root\App\Controllers\AdminController@delete_user","user");
$routes->get("/users/update/([a-zA-Z0-9]*)", "Root\App\Controllers\AdminController@update_user","user");

$routes->get("/posts", "Root\App\Controllers\PostController@posts");
$routes->get("/posts/new", "Root\App\Controllers\PostController@new_post");
$routes->post("/posts/new", "Root\App\Controllers\PostController@_new_post");

try {
    $routes->run();
} catch (NotFoundException $e) {
    $message = $e->getMessage();
    return $e->error404($message);
}
