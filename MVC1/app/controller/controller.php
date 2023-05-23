<?php

namespace App\Controllers;

require_once 'BaseController.php';
require_once __DIR__ . '/../model/User.php';

use App\Controllers\baseController;
use App\Models\User;

class UserController extends baseController
{

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $users = User::login($this->conn, $_POST["name"], $_POST["email"]);
        }
    }
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $name = $user->getName();
            $email = $user->getEmail();
            $user->save($this->conn);
            header('Location: /mooo/MVC1/');
            exit;
        } else {
            require 'VIEWS/user/create.php';
        }
    }
}
