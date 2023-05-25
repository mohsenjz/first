<?php
require_once 'config/database.php';
require_once 'app/controller/UserController.php';
require_once 'app/controller/UserController.php';

use App\Controllers\BaseController;
use App\Controllers\UserController;

$controller = new App\Controllers\UserController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
}
