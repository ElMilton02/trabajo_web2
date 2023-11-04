<?php
require_once 'apps/controllers/HomeController.php';
require_once 'apps/controllers/CategoriesController.php';
require_once 'apps/controllers/AuthController.php';
require_once 'apps/controllers/AboutController.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {

    case 'home': //Muestra el Home
        $controller = new HomeController();
        $controller->showHome();
        break;
    case 'categorias': //Muestra lista de categorias
        $controller = new CategoriesController();
        $controller->showCategories();
        break;
    case 'ropaByCategoria': //Muestra lista de ropas
        $controller = new CategorieController();
        $controller->showClothesByCategorieId($params[1]);
        break;
    case 'eliminarRopa':
        $controller = new CategorieController();
        $controller->removeClothes($params[1], $params[2]);
        break;
    case 'agregarRopa':
        $controller = new CategorieController();
        $controller->addClothes($params[1]);
        break;
    case 'actualizarRopa ':
        $controller = new CategorieController();
        $controller->updateClothes($params[1]);
        break;
    case 'editarRopa':
        $controller = new CategorieController();
        $controller->editClothes($params[1]);
        break;
    case 'eliminarCategoria':
        $controller = new CategoriesController();
        $controller->removeCategorie($params[1]);
        break;
    case 'agregarCategoria':
        $controller = new CategoriesController();
        $controller->addCategorie();
        break;
    case 'actualizarCategoria':
        $controller = new CategoriesController();
        $controller->updateCategorie($params[1]);
        break;
    case 'editCategoria':
        $controller = new CategoriesController();
        $controller->editCategorie($params[1]);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'singup': 
        $controller = new AuthController();
        $controller->showSingup();
        break;
    case 'registro': 
        $controller = new AuthController();
        $controller->upUser();
        break;
    case 'about': 
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'auth': 
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logOut': 
        $controller = new AuthController();
        $controller->logOut();
        break;
    default:
        $controller = new ErrorController();
        $controller->showError404($error);
        break;
}
