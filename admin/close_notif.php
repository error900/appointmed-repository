<?php
include '../connectdatabase.php';
$notif_id = mysqli_real_escape_string($con, $_GET['nid']);
$desc = mysqli_real_escape_string($con, $_GET['desc']);

$delete_notif = "DELETE FROM notification WHERE notification_id = '$notif_id'";
mysqli_query($con, $delete_notif) or die(mysqli_error());

mysqli_close($con);
header("location: notifications.php");
?>