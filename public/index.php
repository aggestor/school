<?php

use Root\Autoloader;
use Routes\Router;
use App\Exceptions\NotFoundException;

include("../Autoloader.php");
Autoloader::register();
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('VIEWS_', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views_en' . DIRECTORY_SEPARATOR);
define('RACINE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);
define('FILES', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR);

session_start();
session_regenerate_id();
$routes = new Router($_SERVER['REQUEST_URI']);

$routes->get("/auth/connexion", "App\Controllers\AuthController@login");
$routes->post("/auth/connexion", "App\Controllers\AuthController@__login");
$routes->get("/auth/reinitialiser-mot-de-passe", "App\Controllers\AuthController@resetPassword");
$routes->get("/auth/logout", "App\Controllers\AdminController@logout");

$routes->get("/dashboard", "App\Controllers\AdminController@dashboard");
$routes->get("/users/current", "App\Controllers\AdminController@profile");
$routes->get("/users", "App\Controllers\AdminController@users");
$routes->get("/users/new", "App\Controllers\AdminController@new_user");
$routes->post("/users/new", "App\Controllers\AdminController@_new_user");
$routes->get("/users/delete/([a-zA-Z0-9]*)", "App\Controllers\AdminController@delete_user","user");
$routes->get("/users/update/([a-zA-Z0-9]*)", "App\Controllers\AdminController@update_user","user");

$routes->get("/posts", "App\Controllers\PostController@posts");
$routes->get("/posts/new", "App\Controllers\PostController@new_post");
$routes->post("/posts/new", "App\Controllers\PostController@_new_post");
$routes->get("/identification/etudiant", "App\Controllers\StudentsController@registration");
$routes->post("/identification/etudiant", "App\Controllers\StudentsController@__registration");
$routes->get("/identification/personnel", "App\Controllers\PersonalsController@registration");


try {
    $routes->run();
} catch (NotFoundException $e) {
    $message = $e->getMessage();
    return $e->error404($message);
}
