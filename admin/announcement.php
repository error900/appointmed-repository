<?php
include '../connectdatabase.php';
if(isset($_POST['submit'])){
	$date = date('Y-m-d');
	$start_publish = $_POST['publish'];
	$end_publish = $_POST['end'];
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$announcement = mysqli_real_escape_string($con, $_POST['message']);
	$to_whom = $_POST['pick'];
	$start_publish = date('Y-m-d', strtotime($start_publish));
	$end_publish = date('Y-m-d', strtotime($end_publish));
	if($date <= $start_publish && ($end_publish >= $start_publish)){
		$notif = "INSERT INTO announcement (send_to, date_created, start_publish, end_publish, subject, announcement_details) 
		VALUES('$to_whom', '$date','$start_publish','$end_publish','$title','$announcement')";

		if (!(mysqli_query($con, $notif))) {
		  	die('Error: ' . mysqli_error($con));
		}
		echo '<script>alert("Successful in creating the announcement.")</script>';
		echo "<script> location.replace('announcement_list.php') </script>";
	}else{
		echo '<script>alert("Please change the date.")</script>';
		echo "<script> location.replace('announcements.php') </script>";
	}
}else
	echo "<script>alert('Error')</script>";
	
mysqli_close($con);
?>
