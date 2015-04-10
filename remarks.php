<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$remarks = mysqli_real_escape_string($con, $_POST['remarks']);
		$pat = $_POST['patient_id'];
		$doc = $_POST['doctor_id'];
		$status = $_POST['isComplete'];
		$appointment_id = $_POST['appointment_id'];
		echo $appointment_id;
		echo $remarks;
		$sql = "UPDATE appointment SET remarks = '$remarks', appointment_status = '$status' WHERE appointment_id = '$appointment_id' ";

		if($status = 'Completed'){
			$date = date("Y-m-d");
			$indicator = "doctor";
			$n_id = "n1003";
			$message = "Your appointment is finished.";
			if($remarks != ''){
				$message = "<strong>Your appointment is done!</strong><br/><strong>Remarks:</strong>" . $remarks;
			}
			$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
			VALUES('$indicator','$doc', '$pat', '$n_id', '$date', '$message')";	
			mysqli_query($con, $notif) or die (mysqli_error($con));
		}

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