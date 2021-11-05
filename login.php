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
        $query = "SELECT * FROM student_details WHERE StudentID = '$StudentID'"; 
        
        $result = mysqli_query($conn, $query);
        
        if($result)
        {
            if($result && mysqli_num_rows($result)>0)
            {
                $student_data = mysqli_fetch_assoc($result);

                if($student_data['student_password']===$student_password)
                {
                    $_SESSION['student_email'] = $student_data['student_email'];
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

    <link rel="stylesheet" href="styles.css" type="text/css">
    
    <title>Login</title>
</head>
<body>
    <header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item ">
            <a class="nav-link " href="signup.php">Student Sign Up</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link active" href="login.php">Student LogIn</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="teacherlogin.php">Teacher LogIn</a>
        </li>
        </ul>
    </nav>
        
    </header>
    <div id= "box">
        <form method="post">
            <div id="logintitle">Student Login</div>
            <input id="text" type="text" name="student_email" placeholder="Email..."></input>
            <input id="text" type="password" name="student_password" placeholder="Password..."></input>
            <input id="loginbtn" type="submit" value="Login"></input>
        </form>
    </div>

    <footer>
        <p>© Venla Kuosmanen </p>
    </footer>
    
</body>
</html>