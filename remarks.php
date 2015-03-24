<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$remarks = $_POST['remarks'];
		$status = $_POST['isComplete'];
		$appointment_id = $_POST['appointment_id'];
		$sql = "UPDATE appointment SET remarks = '$remarks', appointment_status = '$status' WHERE "
	}else{
		echo "<script> alert('Error!); </script>";
		echo "<script> location.replace('schedules.php') </script>";
	}

	mysqli_close($con);

?>