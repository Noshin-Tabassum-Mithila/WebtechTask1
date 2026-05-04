<?php
include 'functions.php';

$id = $_GET['id'];
$result = getStudent($id);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    updateStudent($id, $_POST['name'], $_POST['email'], $_POST['dept']);
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="post">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    Department: <input type="text" name="dept" value="<?php echo $row['department']; ?>"><br><br>

    <input type="submit" name="update" value="Update">
</form>

</body>
</html>
