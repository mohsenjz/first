<h1><a href="<?php echo BASE_PATH ?>">Store</a></h1>
<?php
if (!isset($_SESSION['user_id'])) {
?>
<a href="<?php echo BASE_PATH . 'login' ?>">login</a>
<?php
} else {
?>
<a href="<?php echo BASE_PATH . 'logout' ?>">Logout</a>
<?php
}
?>

<hr>