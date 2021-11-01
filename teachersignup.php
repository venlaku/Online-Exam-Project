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

    <link rel="stylesheet" href="style.css" type="text/css">
    
    <title>Login</title>
</head>
<body>
    <header>
    <h1>Online Exam</h1>
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
    
</body>
</html>