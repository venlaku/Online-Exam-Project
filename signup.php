<?php
session_start();

include("dbHandler.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];
    $student_name = $_POST['student_name'];
    $student_number= $_POST['student_number'];

    if(!empty($student_email) && !empty($student_password) && !is_numeric($student_email))
    {
        //save to database
        $query = "INSERT INTO student_details (student_email, student_password, student_name, student_number) VALUES ('$student_email', '$student_password', '$student_name', '$student_number')"; 
        if(mysqli_query($conn, $query))
        {
            header("Location: login.php");
            die;

        } else {
            echo 'query error: ' . mysqli_error($conn);
        }
       
    } else
    {
        echo "Please enter email and password!";
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
    
    <title>Sign Up</title>
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
            <input id="loginbtn" type="submit" value="Sign Up"></input>
            <br>
            <a href="login.php">Click to Login</a>
        </form>
    </div>
    
</body>
</html>