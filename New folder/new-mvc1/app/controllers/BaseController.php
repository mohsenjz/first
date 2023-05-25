<?php

namespace App\Controllers;

class BaseController
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    protected function render(string $view, array $data = [])
    {
        extract($data);
        require __DIR__ . "/../../views/layout.php";
    }
    public function validateName($name)
    {
        if (empty($name)) {
            return "Name is required";
        } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            return "Only letters and white space allowed";
        } else if (strlen($name) < 2 || strlen($name) > 50) {
            return "Name must be between 2 and 50 characters";
        } else {
            return $name;
        }
    }
    public function validateEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        } else {
            return "$email";
        }
    }
}
