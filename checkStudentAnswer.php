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
    <title>Online Exam - Teacher</title>
</head>
<body>
<header>
    <h1>Online Exam</h1>
    <nav class="navbar sticky-top navbar-expand-lg">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
        <a class="nav-link" href="teacherIndex.php">Home </a>
        </li>
        <li class="nav-item ">
        <a class="nav-link " href="addQuestions.php">Add Exam Questions </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link active" href="checkStudentAnswer.php">Students Answers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">LogOut</a>
        </li>
        </ul>
    </nav>
</header>
    <br>

<div class= "boxtwo">
<?php 
    if(isset($_SESSION['delete']))
    {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
?>
<table>
    <tr>
        <th>S.N.</th>
        <th>Full Name</th>
        <th>Date</th>
        <th>Mark</th>
        <th>Actions</th>
    </tr>
    
    <?php 
        $tbl_name="tbl_result_summary ORDER BY added_date DESC";
        $query=$obj->select_data($tbl_name);
        $res=$obj->execute_query($conn,$query);
        $count_rows=$obj->num_rows($res);
        $sn=1;
        if($count_rows>0)
        {
            while($row=$obj->fetch_data($res))
            {
                $summary_id=$row['summary_id'];
                $student_id=$row['student_id'];
                $marks=$row['marks'];
                $added_date=$row['added_date'];
                ?>
                <tr>
                    <td><?php echo $sn++; ?>. </td>
                    <td>
                        <?php 
                            $tbl_name="tbl_student";
                            $full_name=$obj->get_fullname($tbl_name,$student_id,$conn);
                            echo $full_name;
                        ?>
                    </td>
                    <td><?php echo $added_date; ?></td>
                    <td><?php echo $marks; ?></td>
                    <td>
                        <?php 
                            //Get FAculty from STudent ID
                            $tbl="tbl_student";
                            $tbl2="tbl_faculty";
                            $faculty=$obj->get_faculty($tbl,$student_id,$conn);
                            echo $faculty_name=$obj->get_facultyname($tbl2,$faculty,$conn);
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=view_result&student_id=<?php echo $student_id; ?>&added_date=<?php echo $added_date; ?>"><button type="button" class="btn-update">VIEW</button></a> 
                        <a href="<?php echo SITEURL; ?>admin/pages/delete_result.php?summary_id=<?php echo $summary_id; ?>&student_id=<?php echo $student_id; ?>&added_date=<?php echo $added_date; ?>"><button type="button" class="btn-delete">DELETE</button></a>
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            echo "<tr><td colspan='7'><span class='error'>No Results Found Yet.</span></td></tr>";
        }
    ?>
    
</table>

    </div>
    <footer>
        <p>© Venla Kuosmanen </p>
        <p>Logged in as <?php echo $teacher_data['teacher_name']?></p>
    </footer>
</body>
</html>