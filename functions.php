<?php

//checks if user is logged in. If not prevents user getting to index
function check_login($conn)
{
    if(isset($_SESSION['StudentID']))
    {
        $id=$_SESSION['StudentID'];
        $query ="Select * from student_details where StudentID = '$id' limit 1";
        $result= mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)>0)
        {
            $student_data = mysqli_fetch_assoc($result);
            return $student_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

function check_teacher_login($conn)
{
    if(isset($_SESSION['TeacherID']))
    {
        $id=$_SESSION['TeacherID'];
        $query ="Select * from teacher_details where TeacherID = '$id' limit 1";
        $result= mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)>0)
        {
            $teacher_data = mysqli_fetch_assoc($result);
            return $teacher_data;
        }
    }

    //redirect to login
    header("Location: teachersignup.php");
    die;
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

