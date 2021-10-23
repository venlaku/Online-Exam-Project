<?php

//checks if user is logged in. If not prevents user getting to index
function check_login($con)
{
    if(isset($_SESSION['StudentId']))
    {
        $id=$_SESSION['StudentId'];
        $query ="Select * from student_details where StudentId = '$id' limit 1";
        $result= mysqli_query($con, $query);
        if($result && mysqli_num_rows($result)>0)
        {
            $user_data = mysqli_fetc_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

?>

