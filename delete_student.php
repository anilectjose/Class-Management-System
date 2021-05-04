<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"DELETE FROM `student_db` WHERE role_id='$su_id'");
mysqli_query($con,"DELETE FROM `role_db` WHERE role_id='$su_id'");
header('location: edit_students.php');
?>
