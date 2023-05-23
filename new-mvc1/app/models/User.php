<?php

declare(strict_types=1);

namespace App\Models;

namespace App\Controller;

require_once __DIR__ . "/../controllers/BaseController.php";

use PDO;

abstract class Model
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    abstract public function save($conn);
    abstract public function delete($conn);
}

class User extends Model
{
    private $name;
    private $email;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    static function login($conn, $name, $email)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = validateName($_POST["name"]);
            $email = validateEmail($_POST["email"]);


            $query = "SELECT * FROM users WHERE name = $name AND email = $email";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['name'];
                $_SESSION['user_email'] = $result['email'];
                header("Location:/mooo/new/");
                exit();
            } else {
                header("Location:/mooo/new/login");
            }
        }
    }
    public static function getAllUsers($conn)
    {
        $query = "SELECT * FROM users";
        $statement = $conn->prepare($query);
        $users = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $user = new User();
            $user->id = $row['id'];
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        return $users;
    }

    public static function getUserById($conn, $id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        $user->id = $row['id'];
        $user->setName($row['name']);
        $user->setEmail($row['email']);
        return $user;
    }

    public function save($conn)
    {
        if ($this->id) {
            $query = "UPDATE users SET name = '$this->name', email = '$this->email' WHERE id = ' $this->id'";
            $stmt = mysqli_query($conn, $query);
        } else {
            $query = "INSERT INTO users (name, email) VALUES ('$this->name','$this->email')";
            $stmt = mysqli_query($conn, $query);
            $this->id = mysqli_insert_id($conn);
        }
    }

    public function delete($conn)
    {
        $query = "DELETE FROM users WHERE id = '$this->id' ";
        $stmt = mysqli_query($conn, $query);
    }
}
