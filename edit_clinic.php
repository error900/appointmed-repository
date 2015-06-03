<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
    $doctor_id = $_POST['doctor_id'];
    $clinic_id = $_POST['clinic_id'];

    $clinic_days = mysqli_real_escape_string($con, $_POST['days']);
    $from = mysqli_real_escape_string($con, $_POST['clinic_from']);
    $to = mysqli_real_escape_string($con, $_POST['clinic_to']);
    $clinic_time = $from ."-".$to;

    if(isset($_POST['days'])){
        $days = array();
        foreach($_POST['days'] as $value){
            $days[] = $value;
        }
        $clinic_days = implode("/", $days);
    }

	$update = "UPDATE clinic_schedule SET days = '$clinic_days', time = '$clinic_time' WHERE clinic_id LIKE '$clinic_id'";
    mysqli_query($con, $update) or die(mysqli_error());

	header("location: doctor-profile.php");
}else{
    echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}

?>