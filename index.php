<?php
include 'functions.php';

if (isset($_POST['add'])) {
    addStudent($_POST['name'], $_POST['email'], $_POST['reg'], $_POST['dept']);
    echo "Student Added Successfully";
}

if (isset($_GET['delete'])) {
    deleteStudent($_GET['delete']);
    echo "Student Deleted Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
</head>
<body>

<h2>Add Student</h2>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Reg No: <input type="text" name="reg" required><br><br>
    Department: <input type="text" name="dept" required><br><br>

    <input type="submit" name="add" value="Add Student">
</form>

<hr>

<h2>Student List</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Reg No</th>
    <th>Department</th>
    <th>Action</th>
</tr>

<?php
$data = showStudents();

while ($row = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['registration_no']; ?></td>
    <td><?php echo $row['department']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
        <a href="index.php?delete=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
