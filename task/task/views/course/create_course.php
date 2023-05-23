<h1> creat course</h1>
<form method="POST" action="/darrebni/task/?action=create_course">
    <div>
        <label for="name">Course Name:</label>
        <input type="text" name="course_name" id="course_name">
    </div>
    <div>
        <label for="price">price:</label>
        <input type="number" name="price" id="price">
    </div>

    
    <button type="submit"> create </button>
</form>