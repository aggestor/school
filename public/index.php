<?php

use Root\Autoloader;
use Routes\Router;
use App\Exceptions\NotFoundException;

include("../Autoloader.php");
Autoloader::register();
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR);
define('RACINE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR);
define('FILES', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR);

session_start();
session_regenerate_id();
$routes = new Router($_SERVER['REQUEST_URI']);

$routes->get("/", "App\Controllers\StaticController@index");

$routes->get("/login", "App\Controllers\AuthController@login");
$routes->post("/login", "App\Controllers\AuthController@_login");
$routes->get("/reset-password", "App\Controllers\StudentsController@resetPassword");
$routes->get("/logout", "App\Controllers\AuthController@logout");
$routes->get("/my-profile", "App\Controllers\StudentsController@profile");
$routes->get("/my-profile/modify", "App\Controllers\StudentsController@modify");
$routes->post("/my-profile/modify", "App\Controllers\StudentsController@_modify");
$routes->get("/my-profile/docs", "App\Controllers\StudentsController@getDocs");
$routes->get("/my-profile/docs/add", "App\Controllers\StudentsController@addDocs");
$routes->post("/my-profile/docs/add", "App\Controllers\StudentsController@_addDocs");

$routes->get("/my-profile/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@updateDocs","id");
$routes->post("/my-profile/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@_updateDocs","id");

$routes->get("/profile", "App\Controllers\PersonalsController@profile");
$routes->get("/profile/modify", "App\Controllers\PersonalsController@modify");
$routes->post("/profile/modify", "App\Controllers\PersonalsController@_modify");
$routes->get("/profile/docs", "App\Controllers\PersonalsController@getDocs");
$routes->get("/profile/docs/add", "App\Controllers\PersonalsController@addDocs");
$routes->post("/profile/docs/add", "App\Controllers\PersonalsController@_addDocs");
$routes->get("/profile/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@updateDocs","id");
$routes->post("/profile/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@_updateDocs","id");

$routes->get("/dashboard", "App\Controllers\AdminController@dashboard");
$routes->get("/users/current", "App\Controllers\AdminController@profile");
$routes->get("/users", "App\Controllers\AdminController@users");
$routes->get("/users/new", "App\Controllers\AdminController@new_user");
$routes->post("/users/new", "App\Controllers\AdminController@_new_user");
$routes->get("/users/delete/([a-zA-Z0-9]*)", "App\Controllers\AdminController@delete_user","user");
$routes->get("/users/update/([a-zA-Z0-9]*)", "App\Controllers\AdminController@update_user","user");

$routes->get("/admin", "App\Controllers\AdminController@index");
$routes->get("/admin/login", "App\Controllers\AdminController@login");
$routes->post("/admin/login", "App\Controllers\AdminController@_login");
$routes->get("/admin/register", "App\Controllers\AdminController@register");
$routes->post("/admin/register", "App\Controllers\AdminController@_register");
$routes->get("/admin/current", "App\Controllers\AdminController@profile");
$routes->post("/admin/current", "App\Controllers\AdminController@updateProfile");
$routes->get("/admin/all", "App\Controllers\AdminController@all");
$routes->get("/admin/update/([a-zA-Z0-9]*)", "App\Controllers\AdminController@update");

$routes->get("/admin/personals/docs/add/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@addDocsByAdmin","id");
$routes->post("/admin/personals/docs/add/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@_addDocsByAdmin","id");
$routes->get("/admin/personals/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@modifyByAdmin", 'mat');
$routes->post("/admin/personals/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@_modifyByAdmin", 'mat');
$routes->get("/admin/personals/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@updateDocsByAdmin","id");
$routes->post("/admin/personals/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\PersonalsController@_updateDocsByAdmin","id");

$routes->get("/admin/students/docs/add/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@addDocsByAdmin","id");
$routes->post("/admin/students/docs/add/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@_addDocsByAdmin","id");
$routes->get("/admin/students/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@modifyByAdmin", 'mat');
$routes->post("/admin/students/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@_modifyByAdmin", 'mat');
$routes->get("/admin/students/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@updateDocsByAdmin","id");
$routes->post("/admin/students/docs/modify/([a-zA-Z0-9]*)", "App\Controllers\StudentsController@_updateDocsByAdmin","id");


$routes->get("/admin/inscriptions/students", "App\Controllers\StudentsController@findInscription");
$routes->get("/admin/inscriptions/personals", "App\Controllers\PersonalsController@findInscription");
$routes->get("/admin/inscriptions", "App\Controllers\InscriptionsController@inscriptions")
;
$routes->get("/admin/personals", "App\Controllers\PersonalsController@getAll");

$routes->get("/admin/faculties/new", "App\Controllers\FacultiesController@new");
$routes->post("/admin/faculties/new", "App\Controllers\FacultiesController@_new");
$routes->get("/admin/faculties", "App\Controllers\FacultiesController@all");
$routes->get("/admin/faculties/update/([a-zA-Z0-9]*)", "App\Controllers\FacultiesController@update", "id");
$routes->post("/admin/faculties/update/([a-zA-Z0-9]*)", "App\Controllers\FacultiesController@_update", "id");
$routes->get("/admin/faculties/delete/([a-zA-Z0-9]*)", "App\Controllers\FacultiesController@delete", "id");

$routes->get("/admin/functions/new", "App\Controllers\FunctionsController@new");
$routes->post("/admin/functions/new", "App\Controllers\FunctionsController@_new");
$routes->get("/admin/functions", "App\Controllers\FunctionsController@all");
$routes->get("/admin/functions/update/([a-zA-Z0-9]*)", "App\Controllers\FunctionsController@update", "id");
$routes->post("/admin/functions/update/([a-zA-Z0-9]*)", "App\Controllers\FunctionsController@_update", "id");
$routes->get("/admin/functions/delete/([a-zA-Z0-9]*)", "App\Controllers\FunctionsController@delete", "id");

$routes->get("/admin/domains/new", "App\Controllers\FacSearchDomainController@new");
$routes->post("/admin/domains/new", "App\Controllers\FacSearchDomainController@_new");
$routes->get("/admin/domains", "App\Controllers\FacSearchDomainController@all");
$routes->get("/admin/domains/update/([a-zA-Z0-9]*)", "App\Controllers\FacSearchDomainController@update", "id");
$routes->post("/admin/domains/update/([a-zA-Z0-9]*)", "App\Controllers\FacSearchDomainController@_update", "id");
$routes->get("/admin/domains/delete/([a-zA-Z0-9]*)", "App\Controllers\FacSearchDomainController@delete", "id");

$routes->get("/admin/departments/new", "App\Controllers\DepartmentsController@new");
$routes->post("/admin/departments/new", "App\Controllers\DepartmentsController@_new");
$routes->get("/admin/departments", "App\Controllers\DepartmentsController@all");
$routes->get("/admin/departments/update/([a-zA-Z0-9]*)", "App\Controllers\DepartmentsController@update", "id");
$routes->post("/admin/departments/update/([a-zA-Z0-9]*)", "App\Controllers\DepartmentsController@_update", "id");
$routes->get("/admin/departments/delete/([a-zA-Z0-9]*)", "App\Controllers\DepartmentsController@delete", "id");

$routes->get("/admin/promotions/new", "App\Controllers\PromotionsController@new");
$routes->post("/admin/promotions/new", "App\Controllers\PromotionsController@_new");
$routes->get("/admin/promotions", "App\Controllers\PromotionsController@all");
$routes->get("/admin/promotions/update/([a-zA-Z0-9]*)", "App\Controllers\PromotionsController@update", "id");
$routes->post("/admin/promotions/update/([a-zA-Z0-9]*)", "App\Controllers\PromotionsController@_update", "id");
$routes->get("/admin/promotions/delete/([a-zA-Z0-9]*)", "App\Controllers\PromotionsController@delete", "id");

$routes->get("/admin", "App\Controllers\AdminController@index");
$routes->get("/admin/logout", "App\Controllers\AdminController@logout");

$routes->get("/admin/config", "App\Controllers\ConfigController@index");
$routes->get("/admin/update", "App\Controllers\ConfigController@update");

$routes->get("/identification/etudiant", "App\Controllers\StudentsController@registration");
$routes->post("/identification/etudiant", "App\Controllers\StudentsController@__registration");
$routes->get("/identification/personnel", "App\Controllers\PersonalsController@registration");
$routes->post("/identification/personnel", "App\Controllers\PersonalsController@__registration");

$routes->get("/admin/students/(\d*)", "App\Controllers\StudentsController@getStudent",'mat');
$routes->get("/admin/students/docs/(\d*)", "App\Controllers\StudentsController@getDocsAdminStudent",'id');
$routes->get("/admin/students", "App\Controllers\StudentsController@getAll");
$routes->get("/admin/students/confirm/(\d*)", "App\Controllers\StudentsController@confirmStudent",'mat');
$routes->get("/admin/students/lock/(\d*)", "App\Controllers\StudentsController@lockStudent",'mat');
$routes->get("/admin/students/update/data/(\d*)", "App\Controllers\StudentsController@updateData",'mat');

$routes->get("/admin/personals/(\d*)", "App\Controllers\PersonalsController@getPersonal",'mat');
$routes->get("/admin/personals/docs/(\d*)", "App\Controllers\PersonalsController@getDocsAdminPersonal",'id');
$routes->get("/admin/personals/t/(.*)/(\d*)", "App\Controllers\PersonalsController@getByType",'type', 'type_id');
$routes->get("/admin/personals", "App\Controllers\PersonalsController@getAll");
$routes->get("/admin/personals/confirm/(\d*)", "App\Controllers\PersonalsController@confirmPersonal",'mat');
$routes->get("/admin/personals/lock/(\d*)", "App\Controllers\PersonalsController@lockPersonal",'mat');
$routes->get("/admin/personals/update/data/(\d*)", "App\Controllers\PersonalsController@updateData",'mat');



try {
    $routes->run();
} catch (NotFoundException $e) {
    $message = $e->getMessage();
    return $e->error404($message);
}
