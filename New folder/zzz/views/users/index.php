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

// Get the user's information from the database
$user = getUser($_SESSION['user_id']);

// Display the user's information
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    <h1>Welcome <?php echo $user['name']; ?>!</h1>
    <p>Your email is <?php echo $user['email']; ?>.</p>
    <p>You joined on <?php echo date('F j, Y', strtotime($user['created_at'])); ?>.</p>
</body>

</html>