<?php
namespace app\controller;
require_once "BaseController.php";
require __DIR__ . "/../model/Course.php";
use app\model\Course;
use app\controller\BaseController;


class CourseController extends BaseController{

public function index(){
    $courses=Course::get_all_courses($this->conn);
    $this->render('course/index',compact('courses'));
}


public function create_course(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $course=new Course();
        $course->set_course_name($_POST['course_name']);
        $course->set_price($_POST['price']);
        $course->create_course($this->conn);
        header("location: /darrebni/task");
        exit;
    }else{
           $this->render("course/create_course");
       }
}

public function delete_course(){
    $id=$_GET['id'];
    Course::delete_course($this->conn,$id);
    header('Location: /darrebni/task/');
    exit;
}

    //this method for render the old values of course to be changed:
        public function edit_course() {
            $id = $_GET['id'];
            $course = Course::get_course_by_id($this->conn, $id);
            $this->render('course/edit_course', compact('course'));
        }
        
        //change the value of product props:
        public function update_course() {
            $id = $_POST['id'];
            $course = Course::get_course_by_id($this->conn, $id);
            $course->set_course_name($_POST['course_name']);
            $course->set_price($_POST['price']);
            $course->edit_course($this->conn);
            header('Location: /darrebni/task/');
            exit;
        }

        public function buy(){
            session_start();
            $uid=$_SESSION['id'];
            $cid=$_GET['id'];
            Course::buy($this->conn, $cid ,$uid);
            header('Location: /darrebni/task/');
            exit;
        }

        public function mycourses(){
            $uid=$_SESSION['id'];
            $courses=Course::mycourses($this->conn,$uid);
            $this->render('course/mycourses', compact('courses'));

        }

      public function remove(){
        $cid=$_GET['id'];
        $courses=Course::remove($this->conn,$cid);
        header('Location: /darrebni/task/?action=mycourses');
        exit;







      }  

}