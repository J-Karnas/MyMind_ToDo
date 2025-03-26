<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';



if (!isset($_SESSION)) {
    session_start();
}

require_once 'App/Tools/envEngine.php';

require_once 'App\Tools\errorhan.php';

$router = new \App\Tools\Router();

//main
$router->get("/", "HomeController@homeRender");

//register
$router->get("/register", "RegisterController@registerRender");
$router->post("/register", "RegisterController@userRegister");

//login
$router->get("/login", "LoginController@loginRender");
$router->post("/login", "LoginController@userLogin");

//main
$router->get("/main", "MainController@mainRender");

//settings
$router->get("/settings", "SettingsController@settingsRender");

//viewTasks
$router->get("/viewTasks", "ViewTasksController@viewTasksRender");
$router->post("/addTasks", "ViewTasksController@postTask");
$router->post("/editTask", "ViewTasksController@editTask");

//viewCategories
$router->get("/viewCategories", "ViewCategoriesController@viewCategoriesRender");
$router->post("/addCategories", "ViewCategoriesController@postCategory");
$router->post("/editCategory", "ViewCategoriesController@editCategory");

//today
$router->get("/today", "todayController@todayRender");

//upcoming
$router->get("/upcoming", "upcomingController@upcomingRender");

//ended
$router->get("/ended", "endedController@endedRender");

//notes
$router->get("/notes", "notesController@notesRender");
$router->post("/addNote", "notesController@postNote");
$router->post("/editNote", "notesController@editNote");

//logout
$router->get("/logout", "LoginController@logout");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);
