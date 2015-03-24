<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$contact = $_POST['contact'];
		$occupation = $_POST['occupation'];
		$patient_id = $_POST['patient_id'];

		$update_sql = "UPDATE patient SET patient_name = '$name',patient_contact = '$contact', occupation = '$occupation' WHERE patient_id = '$patient_id' ";
		if (!(mysqli_query($con, $update_sql))) {
	  		die('Error: ' . mysqli_error($con));
		}
		header("location: patient.php");
	}else{
		echo "<script> alert('Error'); </script>";
		echo "<script> location.replace('patient.php') </script>";
	}
mysqli_close($con);

?>