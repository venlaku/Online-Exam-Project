<?php

//checks if user is logged in. If not prevents user getting to index
function check_login($con)
{
    if(isset($_SESSION['StudentID']))
    {
        $id=$_SESSION['StudentID'];
        $query ="Select * from student_details where StudentID = '$id' limit 1";
        $result= mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result)>0)
        {
            $student_data = mysqli_fetc_assoc($result);
            return $student_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

?>

