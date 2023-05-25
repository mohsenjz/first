<?php

namespace app\controller;

require_once "BaseController.php";
require __DIR__ . "/../model/User.php";

use app\model\User;
use app\controller\BaseController;


class UserController extends BaseController
{

    public function main()
    {
        $users = User::get_all_users($this->conn);
        $this->render('user/index', compact('users'));
    }



    public function index()
    {

        $this->render("user/logorregister");
    }


    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->set_name($_POST['name']);
            $user->set_email($_POST['email']);
            $user->set_password($_POST['password']);
            $user->create($this->conn);
            header("location: /mooo/task/?action=login");
            exit;
        } else {
            $this->render("user/signup");
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $user = User::find_user($this->conn, $name, $password);
            if ($user) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['type'] = $user['type'];
                header('Location: /mooo/task/?action=index');
                exit;
            }
        } else {
            $this->render('user/login');
        }
    }


    public function logout()
    {
        session_destroy();
        header('Location: /mooo/task/');
        exit;
    }


    public function delete()
    {
        $id = $_GET['id'];
        User::delete($this->conn, $id);
        header('Location: /mooo/task/');
        exit;
    }


    public function edit()
    {
        $id = $_GET['id'];
        $user = User::get_user_by_id($this->conn, $id);
        $this->render('user/edit', compact('user'));
    }

    public function update()
    {
        $id = $_POST['id'];
        $user = User::get_user_by_id($this->conn, $id);
        $user->set_name($_POST['name']);
        $user->set_email($_POST['email']);
        $user->set_password($_POST['password']);
        $user->update($this->conn);
        header('Location: /mooo/task/');
        exit;
    }
}
