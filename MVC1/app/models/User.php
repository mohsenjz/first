<?php
class User
{
    private $id;
    private $name;
    private $email;


    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
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

    public static function check($connect, $id)
    {
        $select = "SELECT * FROM users where id = '$id'";
        $query = mysqli_query($connect, $select);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    public static function get_all_user($connect)
    {
        $select = "SELECT * FROM users";
        $result = mysqli_query($connect, $select);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->setId($row['id']);
            $user->setName($row['name']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        return $users;
    }


    public  function create_user($connect)
    {

        $this->setName($_POST['name']);
        $this->setEmail($_POST['email']);
        $name = $this->getName();
        $email = $this->getEmail();
        $insert = "INSERT INTO users (name,email) values ('$name','$email')";
        $query = mysqli_query($connect, $insert);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleting_user($connect, $id)
    {
        $select = "DELETE FROM users where id='$id'";
        $query = mysqli_query($connect, $select);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public static function edit_user($connect, $id)
    {
        $edit = "UPDATE users SET name = '{$_POST['name']}', email = '{$_POST['email']}' WHERE id = '$id'";
        $query = mysqli_query($connect, $edit);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}