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
    <title>Online Exam</title>
</head>
<body>
    <header>
    <h1>Online exam</h1>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="logout.php">Log out </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="exam.php">Exam</a>
        </li>
        </ul>
    </header>
    <br>

<?php 
    //Setting Time Limit Here
    if(!isset($_SESSION['start_time']))
    {
        //$_SESSION['start_time']=
    }
?>
Hello <span class="heavy"><?php echo $_SESSION['student']; ?></span>. Welcome to the Exam.<br />
                
    <div class="success">
        <p style="text-align: left;">
            Here are some of the rules and regulations of this app.<br />
            1. This test is automated and you won't be able to return to previous question.<br />
            2. After you click on "Take a Test", the timer will start and it can't be paused or stopped.<br />
        </p>
    </div>
    
    <a href="<?php echo SITEURL; ?>index.php?page=question">
        <button type="button" class="btn-go">Take a Test</button>
    </a>
    <a href="<?php echo SITEURL; ?>index.php?page=logout">
        <button type="button" class="btn-exit">&nbsp; Quit &nbsp;</button>
    </a>
    <footer>
        <p>© Venla Kuosmanen </p>
    </footer>
</body>
</html>
