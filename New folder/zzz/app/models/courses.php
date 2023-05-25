<?php

namespace App\Models;

require_once "user.php";
class Course extends Model
{

    private $course_name;

    public function getCourseName()
    {
        return $this->course_name;
    }

    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }

    public static function getAllCourses($conn)
    {
        $query = "SELECT *FROM courses ";
        $result = mysqli_query($conn, $query);
        $courses = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $course = new Course;
            $course->id = $row['id'];
            $course->setCourseName($row['course_name']);
            $courses = $course;
        }
        return $courses;
    }

    public static function getCourseById($conn, $id)
    {
        $query = "SELECT * FROM courses WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $course = new Course();
        $course->id = $row['id'];
        $course->setCourseName($row['course_name']);
        return $course;
    }

    public function save($conn)
    {
        if ($this->id) {
            $query = "UPDATE courses SET course_name = '$this->course_name',  WHERE id = ' $this->id'";
            $stmt = mysqli_query($conn, $query);
        } else {
            $query = "INSERT INTO courses (course_name) VALUES ('$this->course_name')";
            $stmt = mysqli_query($conn, $query);
            $this->id = mysqli_insert_id($conn);
        }
    }

    public function delete($conn)
    {
        $query = "DELETE FROM users WHERE id = '$this->id' ";
        $stmt = mysqli_query($conn, $query);
    }
}
