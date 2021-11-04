<?php
session_start();

include("dbHandler.php");
include("functions.php");

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
            $msg = 'query error: ' . mysqli_error($conn);
        }
       
    } else
    {
        $msg = "Please enter email and password!";
    }

    if (isset($_POST['student_email'])){ // Checking if email is valid
        $value = $_POST['student_email'];
        if (filter_var($value, FILTER_VALIDATE_EMAIL) == true) {
            $msg = "The input value '".$value."' is a valid email address";
        } else {
            $msg = "The input value '".$value."' is NOT a valid email address";
        }
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
    
    <title>Sign Up</title>
</head>
<body>
    <header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <a class="navbar-default" href="Index.html"><ion-icon name="leaf-outline" alt="This is leaf icon"></ion-icon></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        <a class="nav-link active" href="signup.php">Student Sign Up </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Student LogIn</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="teacherlogin.php">Teacher LogIn</a>
        </li>
        </ul>
    </nav>
    </header>
    <div id= "box">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div id=logintitle>Sign Up</div>
            <input id="text" type="text" name="student_name"  placeholder="Name..."></input>
            <input id="text" type="text" name="student_number"  placeholder="Student Number..."></input>
            <input id="text" type="text" name="student_email" placeholder="Email..."></input>
            <input id="text" type="password" name="student_password"  placeholder="Password..."></input>
            <input id="loginbtn" type="submit" value="Sign Up"></input>
        </form>
    </div>

    <footer>
        <p>© Venla Kuosmanen  </p>
    </footer>
    
</body>
</html>