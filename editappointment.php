<?php 
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$appdate = $_POST['appdate'];
	$appid = $_POST['appointment_id'];
	$appdate = date('m/d/Y', strtotime($appdate));
	$current_date = date('m/d/Y');

	if($appdate >= $current_date){
		$sql = "UPDATE appointment SET appoint_date = '$appdate' WHERE appointment_id= $appid";

		if (!(mysqli_query($con, $sql))) {
		  	die('Error: ' . mysqli_error($con));
		}
		header("location: appointment.php");
	}else{
		echo '<script>alert("Please change the date")</script>';
		echo "<script> location.replace('appointment.php') </script>";
	}
}else
	echo "<script>alert('Error')</script>";
	mysqli_close($con);
?>