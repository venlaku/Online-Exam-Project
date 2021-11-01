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
        //read from database
        $query = "SELECT * FROM student_details WHERE student_email = '$student_email' limit 1"; 
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $student_data = mysqli_fetch_assoc($result);

                if($student_data['student_password']===$student_password)
                {
                    $_SESSION['student_name'] = $student_data['student_name'];
                    header("Location: index.php");
                }
            }
        }
        echo "Wrong email or password!";
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
    <header>
        <h1>Online Exam</h1>
    </header>
    <div id= "box">
        <form method="post">
            <div id="logintitle">Student Login</div>
            <input id="text" type="text" name="student_email" placeholder="Email..."></input>
            <input id="text" type="password" name="student_password" placeholder="Password..."></input>
            <input id="loginbtn" type="submit" value="Login"></input>
            <br>
            <a href="signup.php">Click to Sign up</a>
            <a href="teachersignup.php">Teacher Login</a>
        </form>
    </div>
    
</body>
</html>