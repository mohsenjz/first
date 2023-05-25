<?php
require_once __DIR__ . '/../models/User.php';

class RestPassword
{
    private $connect;
    public function __construct($connect)
    {
        $this->connect = $connect;
    }
}