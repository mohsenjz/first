<?php

namespace App\Model;

class Product
{
    protected $pro_id, $pro_name, $pro_price;

    public function set_id($pro_id)
    {
        $this->pro_id = $pro_id;
    }

    public function get_id()
    {
        return $this->pro_id;
    }

    public function set_name($pro_name)
    {
        $this->pro_name = $pro_name;
    }

    public function get_name()
    {
        return $this->pro_name;
    }

    public function set_price($pro_price)
    {
        $this->pro_price = $pro_price;
    }

    public function get_price()
    {
        return $this->pro_price;
    }

    public static function check_product($connect, $id)
    {
        $select = "SELECT * FROM products where product_id = '$id'";
        $query = mysqli_query($connect, $select);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }

    public static function get_all_product($connect)
    {
        $select = "SELECT * FROM products";
        $result = mysqli_query($connect, $select);
        $products = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $product = new Product();
            $product->set_id($row['product_id']);
            $product->set_name($row['product_name']);
            $product->set_price($row['price']);
            $products[] = $product;
        }
        return $products;
    }

    public  function create_product($connect)
    {

        $this->set_name($_POST['name']);
        $this->set_price($_POST['email']);
        $name = $this->get_name();
        $price = $this->get_price();
        $insert = "INSERT INTO products (product_name,price) values('$name ','$price')";
        $query = mysqli_query($connect, $insert);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
