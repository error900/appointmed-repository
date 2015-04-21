<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$clinic_id = $_POST['clinic_id'];
	$doctor_id = $_POST['doctor_id'];
	$cut_off_no = $_POST['cut_off_no'];
	$cut_off = "UPDATE clinic SET cut_off_no = '$cut_off_no'WHERE clinic_id LIKE '$clinic_id'";
	mysqli_query($con, $cut_off) or die(mysqli_error($con));
	// header("location: doctor-profile.php");
}else{
	echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
?>