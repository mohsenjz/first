<?php
require_once "config/config.php";
require_once "app/controller/UserController.php";
require_once "app/controller/CourseController.php";
$controller = new app\controller\UserController($conn);
$coursecontroller = new app\controller\CourseController($conn);


$action = isset($_GET['action']) ? $_GET['action'] : 'index';
session_start();
switch ($action) {
    case 'index': {
            if (!isset($_SESSION['id'])) {
                $controller->index();
                break;
            } else {
                if ($_SESSION['type'] == 'admin') {
                    $controller->main();
                    $coursecontroller->index();
                    break;
                } else {
                    $coursecontroller->index();
                    break;
                }
            }
        };
    case 'login':
        $controller->login();
        break;
    case 'signup':
        $controller->signup();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'delete_course':
        $coursecontroller->delete_course();
        break;
    case 'edit_course':
        $coursecontroller->edit_course();
        break;
    case 'update_course':
        $coursecontroller->update_course();
        break;
    case 'buy':
        $coursecontroller->buy();
        break;
    case 'create_course':
        $coursecontroller->create_course();
        break;
    case 'mycourses':
        $coursecontroller->mycourses();
        break;
    case 'remove':
        $coursecontroller->remove();
        break;
    default:
        $coursecontroller->index();
}
