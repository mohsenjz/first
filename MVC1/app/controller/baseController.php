<?php

namespace App\Controllers;

class baseController
{

    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
}
