<?php

namespace App\Models;

use mysqli;

abstract class Model
{
    protected $id;

    public function getId()
    {
        return  $this->id;
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

    public static function getAllUsers($conn)
    {
        $query = "SELECT *FROM users ";
        $result = mysqli_query($conn, $query);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User;
            $user->id = $row['id'];
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users = $user;
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
