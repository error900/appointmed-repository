<?php
include '../connectdatabase.php';
if(isset($_POST['submit'])){
	$date = date('Y-m-d');
	$start_publish = $_POST['publish'];
	$end_publish = $_POST['end'];
	$title = $_POST['title'];
	$announcement = $_POST['message'];
	$to_whom = $_POST['pick'];

	$notif = "INSERT INTO announcement (send_to, date_created, start_publish, end_publish, subject, announcement_details) 
	VALUES('$to_whom', '$date','$start_publish','$end_publish','$title','$announcement')";

	if (!(mysqli_query($con, $notif))) {
	  	die('Error: ' . mysqli_error($con));
	}
	echo '<script>alert("Successful in creating the announcement.")</script>';
	echo "<script> location.replace('announcement_list.php') </script>";
	//header("location: announcements.php");
}else
	echo "<script>alert('Error')</script>";
	
mysqli_close($con);
?>
