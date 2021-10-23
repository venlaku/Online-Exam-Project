<?php 
session_start();

if(isset($_SESSION['StudentID']))
{
    unset($_SESSION['StudentID']);
}
header("Location: login.php");
die;

?>