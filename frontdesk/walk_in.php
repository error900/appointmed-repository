<?php
	include 'connectdatabase.php';
	$doctor_id = $_GET['did'];
	$clinic_id = $_GET['cid'];


	$sql = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id'");
?>