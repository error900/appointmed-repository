<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$specialization = $_POST['specialization'];
		$email = $_POST['email'];
		$doctor_id = $_POST['doctor_id'];

		$update_sql = "UPDATE doctor SET doctor_name = '$name', specialization = '$specialization', email = '$email' WHERE doctor_id = '$doctor_id' ";
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