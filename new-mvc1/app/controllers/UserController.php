<?php

namespace App\Controllers;

require_once 'BaseController.php';
require_once __DIR__ . '/../models/User.php';

use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $users = User::getAllUsers($this->conn);
        $this->render('user/index', compact('users'));
    }

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
            $user->save($this->conn);
            header('Location: /mooo/new-mvc');
            exit;
        } else {
            $this->render('user/create');
        }
    }

    public function edit()
    {
        $id = $_GET['id'];
        $user = User::getUserById($this->conn, $id);
        $this->render('user/edit', compact('user'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $user = User::getUserById($this->conn, $id);
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->save($this->conn);
        header('Location: /mooo/new-mvc');
        exit;
    }

    public function delete()
    {
        $id = $_POST['id'];
        $user = User::getUserById($this->conn, $id);
        $user->delete($this->conn);
        header('Location: /mooo/new-mvc');
        exit;
    }
}
