<?php
require_once './app/controllers/UserController.php';
require_once './app/controllers/AppController.php';
require_once './app/controllers/AdminController.php';
require_once './app/controllers/CategoriesController.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action);

$adminController = new AdminController();
$userController = new UserController();
$appController = new AppController();
$categoriesController = new CategoriesController();

// tabla de ruteo
switch ($params[0]) {
    case 'home':
        $appController -> showHomeLocation();
        break;
    //usuario
    case 'logout':
        $userController->logout();
        break;
    case 'login':
        $userController->showLogin();
        break;
    case 'verify':
        $userController->verifyLogin();
        break;
    case 'register':
        $userController->register();
        break;
    case 'insertRegister': 
        $userController->insertRegister(); 
        break;
    //admin
        case 'agregarZapatilla':
        $adminController -> formAdd();
        break;
    case 'add':
        $adminController -> AddShoes();
        break;
    case 'delete':
        $id = $params[1];
        $adminController -> deleteShoes($id);
        break;
    case 'update':
        $id = $params[1];
        $adminController -> formUpdate($id);
        break;
    case 'updateShoe':
        $adminController -> updateShoe();
        break;
    //comun
    case 'showItemById':
        $id = $params[1];
        $appController -> showItemById($id);
        break;
    case 'list':
        $appController -> showListAll();
        break;
    case 'categorias':
        $categoriesController -> showListCategorias();
        break;
    case 'filtrar':
        $id = $params[1];
        $categoriesController -> filtrarCategorias($id);
        break;
    case 'updateCategorie':
        $id = $params[1];
        $categoriesController -> formUpdateCategories($id);
        break;
    case 'updateCategorieById':
        $categoriesController -> updateCategorieById();
        break;
    case 'addCategorie':
        $categoriesController -> formAddCategorie();
        break;
    case 'agregarCategoria':
        $categoriesController -> insertCategorie();
        break;
    case 'deleteCategorie':
        $id = $params[1];
        $categoriesController -> deleteCategorie($id);
        break;
    default: 
        echo('404 Page not found'); 
        break;
}