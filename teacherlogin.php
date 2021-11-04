<?php
session_start();

include("dbHandler.php");
include("functions.php");

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
        <li class="nav-item">
            <a class="nav-link" href="signup.php">Student Sign Up </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Student LogIn</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link active" href="teacherlogin.php">Teacher LogIn</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="teachersignup.php">Teacher SignUp</a>
        </li>
        </ul>
    </nav>
    
    </header>
    <div id= "box">
        <form method="post">
            <div id=logintitle>Teacher Login</div>
            <input id="text" type="text" name="teacher_email" placeholder="Email..."></input>
            <input id="text" type="password" name="teacher_password" placeholder="Password..."></input>
            <input id="loginbtn" type="submit" value="Login"></input>
            <br>
        </form>
    </div>

    <footer>
        <p>© Venla Kuosmanen </p>
    </footer>
    
</body>
</html>