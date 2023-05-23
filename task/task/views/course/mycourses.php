<center>
<h1>My Courses</h1>

<table>
    <thead>
        <tr>
            <th>course Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
            <tr>
               
                <td><?= $course->get_course_name() ?></td>
                <td><?= $course->get_price() ?></td>
                <td>
                <form method="post" action="/darrebni/task/?action=remove&id=<?= $course->get_id() ?>">
                        <button>Remove</button>
                    </form>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
        </center>