<?php
ob_start();
?>
<div class="content">

    <div id="user">


        <?php

        foreach ($users as $user) {
            $id = $user->getId();
            echo "<li>{$user->getName()} - {$user->getEmail()} <a href='" . BASE_PATH . "edit_user/{$id}'>Edit</a> <a
        href='" . BASE_PATH . "delete_user/{$id}'>Delete</a></li>";
        }
        $content = ob_get_clean();
        require __DIR__ . '/../layout.php';
        ?>
    </div>
</div>