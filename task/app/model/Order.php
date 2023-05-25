<?php

namespace app\model;

use app\model\User;

require_once 'User.php';

// class Order extends Model{


//     public static function remove($conn,$cid){
//         $sql="DELETE FROM orders WHERE course_id='$cid'";
//         $result = mysqli_query($conn, $sql);
//      }

//      public static function mycourses($conn,$uid){
//         $sql="SELECT * FROM orders JOIN courses ON orders.course_id=courses.id WHERE user_id='$uid'";
//         $result = mysqli_query($conn, $sql);
//         $row=mysqli_fetch_assoc($result);
//         $course = new Course();
//         $course->set-id($row['id']);
//         $course->set_course_name($row['course_name']);
//         $course->set_price($row['price']);
//         return $course;
//     }
// }