<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

if (!isset($_SESSION)) {
    session_start();
}

require_once 'App/Tools/envEngine.php';
require_once 'App\Tools\errorhan.php';

$router = new \App\Tools\Router();

$router->get("/", "HomeController@homeRender");

$router->get("/register", "RegisterController@registerRender");
$router->post("/register", "RegisterController@userRegister");

$router->get("/login", "LoginController@loginRender");
$router->post("/login", "LoginController@userLogin");

$router->get("/main", "MainController@mainRender");

$router->get("/settings", "SettingsController@settingsRender");
$router->post("/settings/nameEdit", "SettingsController@editUser");
$router->post("/settings/pwdEdit", "SettingsController@editPWD");
$router->post("/settings/delAllData", "SettingsController@delAllData");
$router->post("/settings/delAccount", "SettingsController@delAccount");

$router->get("/viewTasks", "ViewTasksController@viewTasksRender");
$router->post("/addTasks", "ViewTasksController@postTask");
$router->post("/editTask", "ViewTasksController@editTask");
$router->post("/checkTask", "ViewTasksController@acceptTask");
$router->post("/delTask", "ViewTasksController@delTask");

$router->get("/viewCategories", "ViewCategoriesController@viewCategoriesRender");
$router->post("/addCategories", "ViewCategoriesController@postCategory");
$router->post("/editCategory", "ViewCategoriesController@editCategory");
$router->post("/delCategory", "ViewCategoriesController@delCategories");

$router->get("/today", "todayController@todayRender");

$router->get("/upcoming", "upcomingController@upcomingRender");

$router->get("/ended", "endedController@endedRender");

$router->get("/notes", "notesController@notesRender");
$router->post("/addNote", "notesController@postNote");
$router->post("/editNote", "notesController@editNote");
$router->post("/delNote", "notesController@delNote");

$router->get("/logout", "LoginController@logout");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($uri);
