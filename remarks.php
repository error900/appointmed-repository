<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$remarks = mysqli_real_escape_string($con, $_POST['remarks']);
		$status = $_POST['isComplete'];
		$appointment_id = $_POST['appointment_id'];
		echo $appointment_id;
		echo $remarks;
		$sql = "UPDATE appointment SET remarks = '$remarks', appointment_status = '$status' WHERE appointment_id = '$appointment_id' ";

		if (!(mysqli_query($con, $sql))) {
		  	die('Error: ' . mysqli_error($con));
		}
		header("location: schedules.php");
	}else{
		echo "<script> alert('Error!); </script>";
		echo "<script> location.replace('schedules.php') </script>";
	}

	mysqli_close($con);

?>