<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
    $clinic_name = mysqli_real_escape_string($con, $_POST['clinic_name']);
    $clinic_location = mysqli_real_escape_string($con, $_POST['clinic_location']);
    $clinic_contact = mysqli_real_escape_string($con, $_POST['clinic_contact']);
    $clinic_room = mysqli_real_escape_string($con, $_POST['clinic_room']);
    $clinic_days = mysqli_real_escape_string($con, $_POST['days']);
    $from = mysqli_real_escape_string($con, $_POST['clinic_from']);
    $to = mysqli_real_escape_string($con, $_POST['clinic_to']);
    $clinic_time = $from ."-".$to;
    // $clinic_time = mysqli_real_escape_string($con, $_POST['clinic_time']);
    $doctor_id = $_POST['doctor_id'];

    if(isset($_POST['days'])){
        $days = array();
        foreach($_POST['days'] as $value){
            $days[] = $value;
        }
        $clinic_days = implode("/", $days);
    }

    if (!($clinic_name == '' && $clinic_location == '' && $clinic_days=='' && $clinic_room=='' && $clinic_time=='')) {
        $clinic_sql = "INSERT INTO clinic (clinic_location, clinic_name, clinic_contact, doctor_id, cut_off_no) 
			VALUES ('$clinic_location', '$clinic_name', '$clinic_contact','$doctor_id', '50')";
        mysqli_query($con, $clinic_sql) or die(mysqli_error($con));
        $clinic_gen_id = mysqli_insert_id($con);
        $clinic_schedule_sql = "INSERT INTO clinic_schedule (clinic_id, doctor_id, days, time, room_number)
        VALUES ('$clinic_gen_id','$doctor_id','$clinic_days','$clinic_time','$clinic_room')";
        mysqli_query($con, $clinic_schedule_sql) or die(mysqli_error($con));
    }
    
    header("location: doctor-profile.php");
}else{
	echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
?>