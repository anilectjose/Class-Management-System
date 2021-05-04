<?php
include 'db2.php';
$su_id=$_GET['s_id'];
mysqli_query($con,"DELETE FROM `notification_db` WHERE notification_id='$su_id'");
header('location: noti_view.php');
?>
