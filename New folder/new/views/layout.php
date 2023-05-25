<!DOCTYPE html>
<html>

<head>
    <title>PHP MVC Example</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/mooo/new-mvc/">Home</a></li>
            <li><a href="/mooo/new-mvc/?action=create">Create User</a></li>
        </ul>
    </nav>
    <main>
        <?php require "views/$view.php"; ?>
    </main>
</body>

</html>