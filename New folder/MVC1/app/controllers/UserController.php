<?php
session_start();

require_once __DIR__ . '/../models/User.php';
class UserController
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            $users = User::get_all_user($this->connect);
            // while ($row = mysqli_fetch_assoc($result)) {
            //     $user = new User();
            //     $user->setId($row['id']);
            //     $user->setName($row['name']);
            //     $user->setEmail($row['email']);
            //     $users[] = $user;
            // }
            require 'views/user/index.php';
        } else {
            header('Location: /PHPCOURSE/Darrebeni/MVC/login');
        }
    }

    public  function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->setName($_POST['user_name']);
            $user->setEmail($_POST['email']);
            $user_name = $user->getName();
            $user_email = $user->getEmail();
            $select_user = "SELECT * FROM users where name = '$user_name' and email = '$user_email'";
            $query = mysqli_query($this->connect, $select_user);
            $result = mysqli_fetch_assoc($query);
            if (mysqli_num_rows($query) > 0) {

                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['name'];
                $_SESSION['user_email'] = $result['email'];
                header("Location:/PHPCOURSE/Darrebeni/MVC/");
                exit();
            } else {
                header("Location:/PHPCOURSE/Darrebeni/MVC/login");
            }
        } else {
            require 'views/user/login.php';
        }
    }



    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->create_user($this->connect);
            header('Location: /PHPCOURSE/Darrebeni/MVC/login');
            exit;
        } else {
            require 'views/user/create.php';
        }
    }
    public function edit($id)
    {
        $user = User::check($this->connect, $id);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (count($user) > 0) {
                User::edit_user($this->connect, $id);
            }
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
            exit();
        } else {
            require 'views/user/edit.php';
        }
    }

    public function delete_user($user_id)
    {
        $user = User::check($this->connect, $user_id);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (count($user) > 0) {
                User::deleting_user($this->connect, $user_id);
            }
            header("Location:/PHPCOURSE/Darrebeni/MVC/");
        } else {
            require_once "views/user/delete_user.php";
        }
    }

    public function logout()
    {

        session_destroy();
        header("Location:/PHPCOURSE/Darrebeni/MVC/login");
    }
}
