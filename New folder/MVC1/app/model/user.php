<?php

namespace App\Models;


abstract class Model
{
    protected $id;

    public function getId()
    {
        return $this->id;
    }
    abstract function save($conn);
    abstract function delete($conn);
}

class User extends Model
{

    private $name;
    private $email;

    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function insert($conn)
    { {
            $sql = "INSERT INTO users (name,email) VALUES (
            '$this->name',
            '$this->email'
            ) ";
            $stmt = mysqli_query($conn, $sql);
            header('Location: /mooo/MVC/');
            exit;
        }
    }

    public static function getAllUsers($conn)
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($conn, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->id = $row['id'];
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        return $users;
    }

    static function login($conn, $name, $email)
    {
        $query = "SELECT * FROM users WHERE name = $name AND email = $email";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_name'] = $result['name'];
            $_SESSION['user_email'] = $result['email'];
            header("Location:/mooo/MVC/");
            exit();
        } else {
            header("Location:/mooo/MVC/login");
        }
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
