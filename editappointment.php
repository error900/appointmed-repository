<?php 
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$appdate = $_POST['appdate'];
	$pat = $_POST['patient_id'];
	$doc = $_POST['doctor_id'];
	$appid = $_POST['appointment_id'];
	$appdate = date('m/d/Y', strtotime($appdate));
	$current_date = date('m/d/Y');
	$appdate = date('Y-m-d', strtotime($appdate));
	$current_date = date('Y-m-d');
	$message="A patient has rescheduled his appointment to you.";
	$n_id="n1002";
	$indicator="patient";

	if($appdate >= $current_date){
		$sql = "UPDATE appointment SET appoint_date = '$appdate' WHERE appointment_id= $appid";

		if (!(mysqli_query($con, $sql))) {

		$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
		VALUES('$indicator','$doc', '$pat', '$n_id', '$current_date', '$message')";
		//mysqli_query($con, $notif) or die (mysqli_error($con));


		if (!(mysqli_query($con, $sql)) & !(mysqli_query($con, $notif))) {
		  	die('Error: ' . mysqli_error($con));
		}
		header("location: appointment.php");
?>