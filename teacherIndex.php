<?php
session_start();
include("dbHandler.php");
include("functions.php");

$teacher_data = check_teacher_login($conn);
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
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="teacherIndex.php">Home </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link " href="addQuestions.php">Add Exam Questions </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="checkStudentAnswer.php">Students Answers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
        </li>
        </ul>
    </nav>
</header>
    <br>
    <p>Hello <?php echo $teacher_data['teacher_name']?>!</p> 

    <div id= "box">
        <a  href="addQuestions.php">Add Exam Questions</a>
        <a  href="checkStudentAnswer">See Students Answers</a>

    </div>

    <footer>
        <p>© Venla Kuosmanen </p>
        <p>Logged in as <?php echo $teacher_data['teacher_name']?></p>
    </footer>
</body>
</html>