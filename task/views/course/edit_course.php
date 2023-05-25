<h1>Edit course</h1>
<form method="post" action="?action=update_course">
    <div>
        <label for="course_name">course Name:</label>
        <input type="text" name="course_name" id="course_name" value="<?= $course->get_course_name() ?>">
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" value="<?= $course->get_price() ?>">
    </div>
    <input type="hidden" name="id" value="<?= $course->get_id() ?>">
    <button>Update</button>
</form>