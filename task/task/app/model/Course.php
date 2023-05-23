<?php
namespace app\model ;
use app\model\User;
require_once 'User.php';

class Course extends Model{
    private $course_name , $price;

    public function get_course_name(){
        return $this->course_name;
    }


public function set_course_name($name){
    $this->course_name=$name;
}

public function set_price($price){
    $this->price=$price;
}

public function get_price(){
    return $this->price;
}

public static function get_all_courses($conn){
    $sql="SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);
    $courses=[];
    while($row=mysqli_fetch_assoc($result) ){
        $course=new Course();
        $course->set_id($row['id']);
        $course->set_course_name($row['course_name']);
        $course->set_price($row['price']);
        $courses[]=$course;
    }
    return $courses;
}

public static function get_course_by_id($conn,$id){
    $sql="SELECT * FROM courses WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $course = new Course();
    $course->set_id($row['id']) ;
    $course->set_course_name($row['course_name']);
    $course->set_price($row['price']);
    return $course;
}

public function create_course($conn){
    $sql="INSERT INTO courses (course_name,price) VALUES ('$this->course_name', '$this->price')";
    $result = mysqli_query($conn, $sql);
}

public static function delete_course($conn , $id){
    $sql="DELETE FROM courses WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
}

public function edit_course($conn){
    $sql="UPDATE courses SET course_name='$this->course_name' , price='$this->price' WHERE id = ' $this->id'";
    $result = mysqli_query($conn, $sql);

}

public static function buy($conn , $cid , $uid){
    $sql="INSERT INTO orders (course_id,user_id) VALUES ('$cid' , '$uid')";
    $result = mysqli_query($conn, $sql);
}

public static function remove($conn,$cid){
    $sql="DELETE FROM orders WHERE course_id='$cid'";
    $result = mysqli_query($conn, $sql);
 }

 public static function mycourses($conn,$uid){
    $sql="SELECT * FROM orders JOIN courses ON orders.course_id=courses.id WHERE user_id='$uid'";
    $result = mysqli_query($conn, $sql);
    $row=mysqli_fetch_assoc($result);
    $course = new Course();
    $course->set_id($row['id']);
    $course->set_course_name($row['course_name']);
    $course->set_price($row['price']);
    return $course;
}

   
}
