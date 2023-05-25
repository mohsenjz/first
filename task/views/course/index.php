<h1>courses</h1>
<?php if ($_SESSION['type'] == 'admin') {
    echo '<a href="/darrebni/task/?action=create_course">Create course</a>';
} else {
    echo '<a href="/darrebni/task/?action=logout">Log Out</a>';
    echo '<a href="/darrebni/task/?action=mycourses">My Courses</a>';
} ?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>course Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?= $course->get_id() ?></td>
                <td><?= $course->get_course_name() ?></td>
                <td><?= $course->get_price() ?></td>
                <td>
                    <?php if ($_SESSION['type'] == 'admin') { ?>
                        <form method="post" action="/mooo/task/?action=edit_course&id=<?php echo $course->get_id(); ?>">
                            <button>Edit</button>
                        </form>
                        <form method="post" action="/mooo/task/?action=delete_course&id=<?php echo $course->get_id(); ?>">

                            <button>Delete</button>
                        </form>
                    <?php    } else { ?>
                        <form method="post" action="/mooo/task/?action=buy&id=<?php echo $course->get_id(); ?>">

                            <button>buy</button>
                        </form>
                    <?php   } ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>