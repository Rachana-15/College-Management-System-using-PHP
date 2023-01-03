<?php
    require_once('../include/dbcon.php');
    session_start();
    $get_course_id = $_GET['id'];
    $query = "DELETE  FROM `course` WHERE `course_id`='$get_course_id'";
    $run = mysqli_query($con,$query);
    if($run){  
        header('location:course.php');
    }
    else{
        header('location:course.php');     
    }
    
?>