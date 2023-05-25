<?php

require_once '../config/database.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
}

$controller_name = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'CoursesController';
$action_name = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller_file = "../app/controllers/$controller_name.php";

if (file_exists($controller_file)) {
    require_once $controller_file;
    $controller = new $controller_name($conn);
    $controller->$action_name();
} else {
    echo "Controller not found";
}
