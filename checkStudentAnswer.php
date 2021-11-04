<?php
session_start();
include("dbHandler.php");
include("functions.php");

$student_data = check_login($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <title>Online Exam - Teacher</title>
</head>
<body>
    <header>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="logout.php">Log out </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="exam.php">Exam</a>
        </li>
        </ul>
        <h1>Online exam</h1>
        
    </header>
    <br>
    <p>Hello <?php echo $student_data['student_name']?>!</p> 

    <footer>
        <p>© Venla Kuosmanen </p>
    </footer>
</body>
</html>