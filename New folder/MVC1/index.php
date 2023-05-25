<?php
require_once 'config/database.php';
require_once 'app/controller/controller.php';

$UserController = new App\Controllers\UserController($conn);
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'login':
        $UserController->login();

        break;
    case 'create':
        $UserController->create();
        break;
    default:
        $UserController->index();
}
