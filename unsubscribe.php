<?php
include 'connectdatabase.php';
if(isset($_POST['doctor']) && isset($_POST['patient'])){
	$doc = $_POST['doctor'];
	$pat = $_POST['patient'];

	$sql = "DELETE FROM subscribe WHERE doctor_id LIKE '$doc' AND patient_id LIKE '$pat'";
	mysqli_query($con, $sql) or die(mysqli_error());

	//echo "<script> alert('you unsubscribed to the doctor');</script>";
	echo "<script> alert('You have unsubscribed'); </script>";
	echo "<script> location.replace('doctor.php?id=" . $doc . "') </script>";
	//    header("location: doctor.php?id=".$doc);    
}else{
    echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('appointment.php') </script>";
}	
mysqli_close($con);
?>