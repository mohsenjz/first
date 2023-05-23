<?php
session_start();
require_once 'config/database.php';
require_once 'app/controllers/UserController.php';
require_once 'app/controllers/ProductController.php';

$UserController = new App\Controllers\UserController($conn);
$ProductController = new App\Controllers\ProductController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'login':
        $UserController->login();
        break;
    case 'register':
        $UserController->create();
        break;

    case 'index':
        $UserController->index();
        $ProductController->index();
        break;
    case 'users':
        $UserController->index();
        break;
    case 'products':
        $ProductController->index();
        break;
    case 'create':
        $UserController->create();
        break;
    case 'edit':
        $UserController->edit();
        break;
    case 'update':
        $UserController->update();
        break;
    case 'delete':
        $UserController->delete();
        break;
    case 'create_product':
        $ProductController->create_product();
        break;
    case 'edit_product':
        $ProductController->edit();
        break;
    case 'update_product':
        $ProductController->update();
        break;
    case 'delete_product':
        $ProductController->delete();
        break;
    case 'remove_product':
        $ProductController->delete_product();
        break;
    default:
        $UserController->index();
}


exit;
