<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$specialization = mysqli_real_escape_string($con, $_POST['specialization']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$doctor_id = $_POST['doctor_id'];
		
		$clinic_name = mysqli_real_escape_string($con, $_POST['clinic_name']);
		$clinic_location = mysqli_real_escape_string($con, $_POST['clinic_location']);
		$clinic_contact = mysqli_real_escape_string($con, $_POST['clinic_contact']);

		if(!($clinic_name == '' && $clinic_contact == '' && $clinic_location == '')){
			$clinic_sql = "INSERT INTO clinic (clinic_location, clinic_name, clinic_contact, doctor_id) 
			VALUES ('$clinic_location', '$clinic_name', '$clinic_contact','$doctor_id')";
			if (!(mysqli_query($con, $clinic_sql))) {
	  			die('Error: ' . mysqli_error($con));
			}
		}

		$update_sql = "UPDATE doctor SET specialization = '$specialization', email = '$email' WHERE doctor_id = '$doctor_id' ";
		if (!(mysqli_query($con, $update_sql))) {
	  		die('Error: ' . mysqli_error($con));
		}
		header("location: doctor-profile.php");
	}else{
		echo "<script> alert('Error'); </script>";
		echo "<script> location.replace('doctor-profile.php') </script>";
	}
mysqli_close($con);

?>