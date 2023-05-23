<?php
namespace app\controller;


abstract class  BaseController{
    protected $conn;

    public function __construct($conn){
        $this->conn=$conn;
    }


    public function render($view , $data =[]){
        extract($data);
        require __DIR__ . "/../../views/layout.php";
    }
}