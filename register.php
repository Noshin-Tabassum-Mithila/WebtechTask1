<?php
session_start();

$name = $email = $username = $age = $gender = $course = "";
$errors = [];

if(isset($_POST['register'])){

    // taking values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $age = $_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $course = $_POST['course'];
    $terms = isset($_POST['terms']);

    // validation
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm) || empty($age) || empty($course)){
        $errors[] = "All fields are required!";
    }

    if(!preg_match("/^[a-zA-Z ]*$/", $name)){
        $errors[] = "Name can only contain letters and spaces";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format";
    }

    if(strlen($username) < 5){
        $errors[] = "Username must be at least 5 characters";
    }

    if(strlen($password) < 6){
        $errors[] = "Password must be at least 6 characters";
    }

    if($password != $confirm){
        $errors[] = "Passwords do not match";
    }

    if($age < 18){
        $errors[] = "Age must be 18 or above";
    }

    if(empty($gender)){
        $errors[] = "Please select gender";
    }

    if($course == ""){
        $errors[] = "Please select a course";
    }

    if(!$terms){
        $errors[] = "You must accept terms";
    }

    // if no errors
    if(count($errors) == 0){

        // SESSION
        $_SESSION['user'] = $username;

        // COOKIE (valid for 1 hour)
        setcookie("user_email", $email, time()+3600);

        echo "<h2>Registration Successful!</h2>";
        echo "Name: ".$name."<br>";
        echo "Email: ".$email."<br>";
        echo "Username: ".$username."<br>";
        echo "Age: ".$age."<br>";
        echo "Gender: ".$gender."<br>";
        echo "Course: ".$course."<br>";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>Student Registration</h2>

<form method="POST">

Name: <input type="text" name="name"><br><br>

Email: <input type="text" name="email"><br><br>

Username: <input type="text" name="username"><br><br>

Password: <input type="password" name="password"><br><br>

Confirm Password: <input type="password" name="confirm"><br><br>

Age: <input type="number" name="age"><br><br>

Gender:
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<br><br>

Course:
<select name="course">
    <option value="">Select</option>
    <option value="CSE">CSE</option>
    <option value="EEE">EEE</option>
    <option value="BBA">BBA</option>
</select>
<br><br>

<input type="checkbox" name="terms"> I accept terms<br><br>

<input type="submit" name="register" value="Register">

</form>

<?php
// show errors
if(!empty($errors)){
    echo "<h3>Errors:</h3>";
    foreach($errors as $e){
        echo $e."<br>";
    }
}
?>

</body>
</html>
