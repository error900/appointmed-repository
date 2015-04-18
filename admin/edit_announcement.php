<?php
include '../connectdatabase.php';
if(isset($_POST['submit'])){
	$announcement_id = $_GET['id'];
	$date = date('Y-m-d');
	$start_publish = $_POST['publish'];
	$end_publish = $_POST['end'];
	$title = $_POST['title'];
	$announcement = $_POST['message'];
	$to_whom = $_POST['pick'];


	$update_announcement = "UPDATE announcement SET send_to = '$to_whom', date_created = '$date', 
	start_publish = '$start_publish', end_publish = '$end_publish', subject = '$title', announcement_details = '$announcement'
	WHERE announcement_id = '$announcement_id'";
	
	if (!(mysqli_query($con, $update_announcement))) {
	  	die('Error: ' . mysqli_error($con));
	}
		echo '<script>alert("Successful in editing your announcement.")</script>';
		echo "<script> location.replace('announcement_list.php') </script>";
		//header("location: announcements.php");
	}else
		echo "<script>alert('Error')</script>";
	
mysqli_close($con);
?>