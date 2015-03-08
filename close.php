<?php 
	include 'connectdatabase.php';
	$app_id= mysqli_real_escape_string($con, $_GET['id']);
	$appointment_status = 'Cancelled';
	$doc = mysqli_real_escape_string($con, $_GET['doc']);
	$pat = mysqli_real_escape_string($con, $_GET['pat']);
	$message="A patient has cancelled his appointment.";
	$n_id="n1004";
	$indicator="patient";

 	$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, notif_id, notification) 
	VALUES('$indicator','$doc', '$pat', '$n_id', '$message')";
	mysqli_query($con, $notif) or die (mysqli_error($con));

	$sql = "UPDATE appointment SET appointment_status ='Cancelled' WHERE appointment_id = '$app_id' ";
	$sql2 = "INSERT INTO appointment_history (appointment_status, appointment_id, doctor_id, patient_id) 
	VALUES ('Cancelled', '$app_id', '$doc', '$pat')";
	mysqli_query($con, $sql) or die (mysqli_error());
	mysqli_query($con, $sql2) or die (mysqli_error());
	
	mysqli_close($con);
	header("location: appointment.php");
?>