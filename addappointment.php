<?php 
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$date = $_POST['date'];
	$patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];
	$clinic_id = $_POST['clinic_id'];
	$appointment_status="Inqueue";
	$remarks='';
	$message="A patient has requested an appointment.";
	$legend_id="n1004";
	$indicator="patient";
	$date = date('Y-m-d', strtotime($date));
	$date_today = date('Y-m-d');

	$limit_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appoint_date LIKE '$date'" );
	$limit_row = mysqli_num_rows($limit_result);

	$single_result = mysqli_query($con, "SELECT COUNT(*) AS count FROM appointment WHERE doctor_id LIKE '$doctor_id' AND patient_id LIKE '$patient_id' AND appoint_date LIKE '$date'" );
    $single_row = mysqli_fetch_array($single_result);
    $single_count =  $single_row['count'];

    if($limit_row >= 7){
		echo '<script>alert("Reached the maximum number of patient for the day. Please change the date")</script>';
		echo "<script> location.replace('doctor.php?id=".$doctor_id."') </script>";
	} else if($single_count != 0){
		echo '<script>alert("Cannot schedule for the same doctor in a single day. Please change the date")</script>';
		echo "<script> location.replace('doctor.php?id=".$doctor_id."') </script>";
	} else if(($date >= $date_today) && (($count_row < 7) && ($not == 0))){
		$sql = "INSERT INTO appointment (doctor_id, patient_id, appoint_date, appointment_status, remarks, clinic_id) 
		VALUES('$doctor_id', '$patient_id', '$date', '$appointment_status', '$remarks','$clinic_id')";

		$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
		VALUES('$indicator', '$doctor_id', '$patient_id', '$legend_id', '$date_today','$message')";

		if (!(mysqli_query($con, $sql)) & !(mysqli_query($con, $notif)) ) {
		  	die('Error: ' . mysqli_error($con));
		}
		header("location: appointment.php");
	}else {
		echo '<script>alert("Please change the date")</script>';
		echo "<script> location.replace('doctor.php?id=".$doctor_id."') </script>";
	}
}else{
	echo "<script>alert('Error')</script>";
	mysqli_close($con);
}
?>