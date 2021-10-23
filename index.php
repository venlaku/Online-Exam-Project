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
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Online Exam</title>
</head>
<body>
    <a href="logout.php" class="btn">Logout</a>
    <h1>Online exam</h1>
    <br>
    <p>Hello <?php echo $student_data['student_name']?>!</p> 
</body>
</html>
