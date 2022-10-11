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
$routes->get("/", "App\Controllers\StaticController@index");

$routes->get("/dashboard", "App\Controllers\AdminController@dashboard");
$routes->get("/users/current", "App\Controllers\AdminController@profile");
$routes->get("/users", "App\Controllers\AdminController@users");
$routes->get("/users/new", "App\Controllers\AdminController@new_user");
$routes->post("/users/new", "App\Controllers\AdminController@_new_user");
$routes->get("/users/delete/([a-zA-Z0-9]*)", "App\Controllers\AdminController@delete_user","user");
$routes->get("/users/update/([a-zA-Z0-9]*)", "App\Controllers\AdminController@update_user","user");

$routes->get("/admin", "App\Controllers\AdminController@index");
$routes->get("/admin/login", "App\Controllers\AdminController@login");
$routes->get("/admin/register", "App\Controllers\AdminController@register");
$routes->post("/admin/register", "App\Controllers\AdminController@_register");
$routes->get("/admin/profile", "App\Controllers\AdminController@index");
$routes->get("/admin/all", "App\Controllers\AdminController@all");
$routes->get("/admin/update/([a-zA-Z0-9]*)", "App\Controllers\AdminController@index");

$routes->get("/admin/etudiants", "App\Controllers\AdminController@index");
$routes->get("/admin/personnels", "App\Controllers\AdminController@index");

$routes->get("/admin/faculties/new", "App\Controllers\FacultiesController@new");
$routes->get("/admin/faculties", "App\Controllers\FacultiesController@all");
$routes->get("/admin/faculties/update/([a-zA-Z0-9]*)", "App\Controllers\FacultiesController@update", "id");
$routes->get("/admin/faculties/delete/([a-zA-Z0-9]*)", "App\Controllers\FacultiesController@delete", "id");

$routes->get("/admin/functions/new", "App\Controllers\FunctionsController@new");
$routes->post("/admin/functions/new", "App\Controllers\FunctionsController@_new");
$routes->get("/admin/functions", "App\Controllers\FunctionsController@all");
$routes->get("/admin/functions/update/([a-zA-Z0-9]*)", "App\Controllers\FunctionsController@update", "id");
$routes->get("/admin/functions/delete/([a-zA-Z0-9]*)", "App\Controllers\FunctionsController@delete", "id");

$routes->get("/admin/departments/new", "App\Controllers\DepartmentsController@new");
$routes->get("/admin/departments", "App\Controllers\DepartmentsController@all");
$routes->get("/admin/departments/update/([a-zA-Z0-9]*)", "App\Controllers\DepartmentsController@update", "id");
$routes->get("/admin/departments/delete/([a-zA-Z0-9]*)", "App\Controllers\DepartmentsController@delete", "id");

$routes->get("/admin/promotions/new", "App\Controllers\PromotionsController@new");
$routes->get("/admin/promotions", "App\Controllers\PromotionsController@all");
$routes->get("/admin/promotions/update/([a-zA-Z0-9]*)", "App\Controllers\PromotionsController@update", "id");
$routes->get("/admin/promotions/delete/([a-zA-Z0-9]*)", "App\Controllers\PromotionsController@delete", "id");

$routes->get("/admin/", "App\Controllers\AdminController@index");

$routes->get("/identification/etudiant", "App\Controllers\StudentsController@registration");
$routes->post("/identification/etudiant", "App\Controllers\StudentsController@__registration");
$routes->get("/identification/personnel", "App\Controllers\PersonalsController@registration");

$routes->get("/etudiants/(\d*)", "App\Controllers\StudentsController@getStudent",'mat');
$routes->get("/etudiants/modification/data/(\d*)", "App\Controllers\StudentsController@updateData",'mat');
$routes->get("/etudiants/modification/mot-de-passe/(\d*)", "App\Controllers\StudentsController@updatePassword",'mat');

//theses routes bellow are for testing purposes

$routes->get('/test', "App\Controllers\TestController@std");


try {
    $routes->run();
} catch (NotFoundException $e) {
    $message = $e->getMessage();
    return $e->error404($message);
}
