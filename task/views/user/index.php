<center>
    <a href="/mooo/task/?action=logout">Log Out</a>
    <h1>Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->get_id() ?></td>
                    <td><?= $user->get_name() ?></td>
                    <td><?= $user->get_email() ?></td>
                    <td><?= $user->get_password() ?></td>
                    <td>
                        <form method="post" action="/mooo/task?action=edit&id=<?= $user->get_id() ?>">
                            <button>Edit</button>
                        </form>
                        <form method="post" action="/mooo/task/?action=delete&id=<?= $user->get_id() ?>">

                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</center>