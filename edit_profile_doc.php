<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($con, $_POST['name']);
		$specialization = mysqli_real_escape_string($con, $_POST['specialization']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$doctor_id = $_POST['doctor_id'];
		$doctor_status = $_POST['doctor_status'];

		$clinic_name = mysqli_real_escape_string($con, $_POST['clinic_name']);
		$clinic_location = mysqli_real_escape_string($con, $_POST['clinic_location']);
		$clinic_contact = mysqli_real_escape_string($con, $_POST['clinic_contact']);

		$firstname = strtolower($_POST['firstname']);
		$lastname = strtolower($_POST['lastname']);
		$firstname = mysqli_real_escape_string($con, ucfirst($firstname));
		$lastname = mysqli_real_escape_string($con, ucfirst($lastname));
		$secretary_name = $firstname . ' ' .$lastname;
		$secretary_id = substr( md5(uniqid(rand(), true)), 0, 7);
		$n = substr($firstname, 0, 2);
		$username = $n.''.$lastname;
		$password = $lastname;
		$password = hash('sha256', $password);

		if(!($clinic_name == '' && $clinic_contact == '' && $clinic_location == '')){
			$clinic_sql = "INSERT INTO clinic (clinic_location, clinic_name, clinic_contact, doctor_id) 
			VALUES ('$clinic_location', '$clinic_name', '$clinic_contact','$doctor_id')";
			if (!(mysqli_query($con, $clinic_sql))) {
	  			die('Error: ' . mysqli_error($con));
			}
		}

		if(!($firstname == '' && $lastname == '')){
		  	$sqlaccount = "INSERT INTO account (username, password, account_type, account_status)
			VALUES('$username', '$password', 'Secretary', 'active')";
			$secretary_sql = "INSERT INTO secretary (secretary_id, secretary_name, doctor_id, username) 
			VALUES ('$secretary_id', '$secretary_name', '$doctor_id','$username')";
			if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $secretary_sql))) {
	  			die('Error: ' . mysqli_error($con));
			}
		}

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