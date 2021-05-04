<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"UPDATE `student_db` SET `status`=1 WHERE role_id='$su_id'");
mysqli_query($con,"UPDATE `role_db` SET `sts`=1 WHERE role_id='$su_id'");
header('location: enable_online.php');
?>