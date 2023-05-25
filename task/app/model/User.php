<?php

namespace app\model;

abstract class Model
{
    protected $id;

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }
}

class User extends Model
{
    private $name, $email, $password;


    //set and get methods:
    public function get_name()
    {
        return $this->name;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_password()
    {
        return $this->password;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }
    public function set_email($email)
    {
        $this->email = $email;
    }
    public function set_password($password)
    {
        $this->password = $password;
    }


    public static function get_all_users($conn)
    {
        $sql = "SELECT * FROM users ";
        $result = mysqli_query($conn, $sql);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->set_id($row['id']);
            $user->set_name($row['name']);
            $user->set_email($row['email']);
            $user->set_password($row['password']);
            $users[] = $user;
        }
        return $users;
    }

    public static function get_user_by_id($conn, $id)
    {
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user = new User();
        $user->set_id($row['id']);
        $user->set_name($row['name']);
        $user->set_email($row['email']);
        $user->set_password($row['password']);
        return $user;
    }

    public static function find_user($conn, $name, $password)
    {
        $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    public function create($conn)
    {
        $sql = "INSERT INTO users (name,email,password,type) VALUES ('$this->name','$this->email','$this->password','user')";
        $result = mysqli_query($conn, $sql);
    }

    public function update($conn)
    {
        $sql = "UPDATE users SET name='$this->name' , email='$this->email' , password='$this->password' WHERE id ='$this->id'";
        $result = mysqli_query($conn, $sql);
    }

    public static function delete($conn, $id)
    {
        $sql = "DELETE FROM  users  WHERE id ='$id'";
        $result = mysqli_query($conn, $sql);
    }
}
