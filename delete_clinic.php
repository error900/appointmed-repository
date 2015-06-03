<?php
include 'connectdatabase.php';
if(isset($_GET['did']) && isset($_GET['cid'])){
	$doctor_id = $_GET['did'];
	$clinic_id = $_GET['cid'];
    $delete_schedule = "DELETE FROM clinic_schedule WHERE clinic_id LIKE '$clinic_id' AND doctor_id LIKE '$doctor_id'";
    mysqli_query($con, $delete_schedule) or die(mysqli_error($con));

    $delete_sec = "DELETE FROM clinic_sec WHERE clinic_id LIKE '$clinic_id'";
    mysqli_query($con, $delete_sec) or die(mysqli_error($con));

	$delete = "DELETE FROM clinic WHERE clinic_id LIKE '$clinic_id' AND doctor_id LIKE '$doctor_id'";
    mysqli_query($con, $delete) or die(mysqli_error($con));

    header("location: doctor-profile.php");
}else{
    echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
?>