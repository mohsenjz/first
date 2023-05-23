<h1>Edit user</h1>
<form method="post" action="?action=update">
    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $user->get_name() ?>">
    </div>
    <div>
        <label for="email">Emial:</label>
        <input type="email" name="email" id="email" value="<?= $user->get_email() ?>">
    </div>
    <div>
        <label for="password">password:</label>
        <input type="text" name="password" id="password" value="<?= $user->get_password() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $user->get_id() ?>">
    <button>Update</button>
</form>