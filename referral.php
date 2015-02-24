<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){

	$patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];
	$referred_id = $_POST['referred_id'];
	$appointment_id = $_POST['appointment_id'];

	echo $referred_id. $doctor_id . $patient_id;

	$update_appointment = "UPDATE appointment SET doctor_id = '$referred_id' WHERE appointment_id = '$appointment_id'";

	$sql = "INSERT INTO referred (doctor_id, patient_id, referred_id) VALUES('$doctor_id', '$patient_id', '$referred_id')";

	if (!(mysqli_query($con, $update_appointment)) || !mysqli_query($con, $sql)) {
	  	die('Error: ' . mysqli_error($con));
	}
	header("location: schedules.php");
}else
	echo "<script>alert('Error')</script>";
	

mysqli_close($con);
/*$sql = "UPDATE details SET currentdate = '$currentdate', office = '$office',particulars = '$particulars', 
isReceived = '$isReceived', outdate = '$outdate' WHERE id = '$id'";
if (!mysqli_query($con,$sql)) {
	die('Error: ' . mysqli_error($con));
}*/
?>
