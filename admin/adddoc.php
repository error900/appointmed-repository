<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		
		$firstname= $_POST['firstname'];
		$lastname=$_POST['lastname'];
		$specialization = $_POST['specialization'];
		$status= $_POST['status'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$name = $firstname .' '.$lastname;
		$password = $lastname;
		$password = hash('sha256', $password);

		$doctorid = substr( md5(uniqid(rand(), true)), 0, 7);

		$sqlaccount = "INSERT INTO account (username, password, account_type, account_status)
		VALUES('$username', '$password', 'DOCTOR', 'active')";
		$sqldoctor = "INSERT INTO doctor (doctor_id, doctor_name, specialization, doctor_status, email, username) 
		VALUES('$doctorid','$name', '$specialization','$status', '$email', '$username')";

		if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $sqldoctor))) {
	  		die('Error: ' . mysqli_error($con));
	    }
	} else{
		header("location: signup.php");
		die();
	}

?>