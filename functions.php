<?php
include 'db.php';

function addStudent($name, $email, $reg, $dept)
{
    global $conn;
    $sql = "INSERT INTO students(name,email,registration_no,department)
            VALUES('$name','$email','$reg','$dept')";
    return mysqli_query($conn, $sql);
}

function showStudents()
{
    global $conn;
    $sql = "SELECT * FROM students";
    return mysqli_query($conn, $sql);
}

function getStudent($id)
{
    global $conn;
    $sql = "SELECT * FROM students WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function updateStudent($id, $name, $email, $dept)
{
    global $conn;
    $sql = "UPDATE students 
            SET name='$name', email='$email', department='$dept'
            WHERE id=$id";
    return mysqli_query($conn, $sql);
}

function deleteStudent($id)
{
    global $conn;
    $sql = "DELETE FROM students WHERE id=$id";
    return mysqli_query($conn, $sql);
}
?>
