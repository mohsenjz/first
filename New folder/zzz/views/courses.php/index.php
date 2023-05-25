<?php
// Include any necessary files or libraries
require_once('config.php');
require_once('functions.php');

// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php');
    exit;
}

// Get the list of courses from the database
$courses = getAllCourses();

// Display the list of courses
?>
<!DOCTYPE html>
<html>

<head>
    <title>Courses</title>
</head>

<body>
    <h1>Courses</h1>
    <ul>
        <?php foreach ($courses as $course) : ?>
            <li><a href="course.php?id=<?php echo $course['id']; ?>"><?php echo $course['title']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>