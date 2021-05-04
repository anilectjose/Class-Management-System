<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"DELETE FROM `subject_db` WHERE `sub_id`='$su_id'");
header('location: subject_view.php');
?>
