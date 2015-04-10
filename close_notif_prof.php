<?php
include 'connectdatabase.php';
$notif_id = mysqli_real_escape_string($con, $_GET['nid']);
$desc = mysqli_real_escape_string($con, $_GET['desc']);

$sql2 = "INSERT INTO notification_history (notification_id, description) 
	VALUES ('$notif_id', '$desc')";

mysqli_query($con, $sql2) or die(mysqli_error());

$delete_notif = "DELETE FROM notification WHERE notification_id = '$notif_id'";
mysqli_query($con, $delete_notif) or die(mysqli_error());

mysqli_close($con);
header("location: patient.php");
?>