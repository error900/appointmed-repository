<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$date = date('Y-m-d');
	$patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];
	$referred_id = $_POST['referred_id'];
	$appointment_id = $_POST['appointment_id'];


	$d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'" );
	$d_row =  mysqli_fetch_array($d_result);
	$rd_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$referred_id'" );
	$rd_row =  mysqli_fetch_array($rd_result);


	$message="You have been referred by doctor ".$d_row['doctor_name']." to doctor ".$rd_row['doctor_name'];
	$n_id="n1002";
	$indicator="doctor";
	$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
	VALUES('$indicator','$doctor_id', '$patient_id', '$n_id', '$date' , '$message')";

	$message="You have been referred by Dr. ".$d_row['doctor_name']." to Dr. ".$rd_row['doctor_name'];
	$n_id="n1002";
	$indicator="doctor";
	$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, noticaion_date, notification) 
	VALUES('$indicator','$doctor_id', '$patient_id', '$n_id', '$date', '$message')";

	mysqli_query($con, $notif) or die (mysqli_error($con));


	$update_appointment = "UPDATE appointment SET doctor_id = '$referred_id', appointment_status = 'Referred' WHERE appointment_id = '$appointment_id'";
	$sql = "INSERT INTO referred (doctor_id, patient_id, referred_id) VALUES('$doctor_id', '$patient_id', '$referred_id')";

	if (!(mysqli_query($con, $update_appointment)) || !mysqli_query($con, $sql)) {
	  	die('Error: ' . mysqli_error($con));
	}
	header("location: schedules.php");
}else
	echo "<script>alert('Error')</script>";
	

mysqli_close($con);
?>
