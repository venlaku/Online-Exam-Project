<?php
session_start();

include("dbHandler.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];

    if(!empty($student_email) && !empty($student_password) && !is_numeric($student_email))
    {
        //save to database
        $query = "Insert into student_details (StudentID, student_email, student_password, student_name, student_number) values ('$StudentID', '$student_email', '$student_password', $student_name, $student_number)"; 
        mysqli_query($conn, $query);
        header("Location: login.php");
        die;
    } else
    {
        echo "Please enter some valid info!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css" type="text/css">
    
    <title>Login</title>
</head>
<body>
    <h1>Online Exam</h1>
    <div id= "box">
        <form method="post">
            <div id=logintitle>Sign Up</div>
            <input id="text" type="text" name="student_name" placeholder="Name..."></input>
            <input id="text" type="text" name="student_number" placeholder="Student Number..."></input>
            <input id="text" type="text" name="student_email" placeholder="Email..."></input>
            <input id="text" type="password" name="student_password" placeholder="Password..."></input>
            <input id="text" type="password" name="student_password" placeholder="Confirm Password..."></input>
            <input id="loginbtn" type="submit" value="Sign Up"></input>
            <br>
            <a href="login.php">Click to Login</a>
        </form>
    </div>
    
</body>
</html>