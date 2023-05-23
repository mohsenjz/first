<?php

namespace App\Controllers;

class baseController
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    protected function render(string $view, array $data = [])
    {
        extract($data);
        require __DIR__ . "/../../views/layout.php";
    }
}
