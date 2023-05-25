<?php

namespace App\Model;

class Model
{
    private $id;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
}

class User extends Model
{
    private $name;
    private $email;
    private $password;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function get()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAllUsers($conn)
    {
        $query = "SELECT * FROM users ";
        $result = mysqli_query($conn, $query);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->set_id($row['id']);
            $user->setName($row["name"]);
            $user->setPassword($row["password"]);
            $users[] = $user;
        }
        return $users;
    }

    public function getUserById($conn, $id)
    {
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        $user->set_id($row['id']);
        $user->setName($row["name"]);
        $user->setPassword($row["password"]);
        return $user;
    }

    public function find_user($conn, $name, $password)
    {
        $query = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
        $result = mysqli_query($result);
    }
}
