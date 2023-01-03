<?php
session_start();
require_once('../dbcon.php');
$post_id = $_GET['id'];
$query = "DELETE FROM `posts` WHERE `post_id`='$post_id'";
$run = mysqli_query($con,$query);
header("LOCATION:../../students/profile.php");
?>