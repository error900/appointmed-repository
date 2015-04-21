<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $doctor_id = $_POST['doctor_id'];
    $doctor_status = $_POST['doctor_status'];
    $date = date('Y-m-d');
    $old_specs = $_POST['previous_spec'];

    //notification
    $status = mysqli_query($con, "SELECT doctor_status, doctor_name FROM doctor WHERE doctor_id LIKE '$doctor_id'");
    $subscribed = mysqli_query($con, "SELECT patient_id FROM subscribe WHERE doctor_id LIKE '$doctor_id'");
    $status_row = mysqli_fetch_array($status);
    if ($doctor_status != $status_row['doctor_status']) {
        echo $doctor_status;
        echo $status_row['doctor_status'];
        $message = "Doctor " . $status_row['doctor_name'] . " has changed his/her status to " . $doctor_status;
        $n_id = "n1004";
        $indicator = "doctor";
        while ($get_subscribed = mysqli_fetch_array($subscribed)) {
            $subscribers = $get_subscribed['patient_id'];
            $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
				VALUES('$indicator','$doctor_id', '$subscribers', '$n_id', '$date', '$message')";
            mysqli_query($con, $notif) or die(mysqli_error($con));
        }
    }

    if(!($specialization == '')){
        $new_specialization = $old_specs.'/'.$specialization;
        echo $new_specialization;
        $spec_sql = "UPDATE doctor SET specialization = '$new_specialization' WHERE doctor_id = '$doctor_id' ";
        mysqli_query($con, $spec_sql) or die(mysqli_error($con));
    }
    
    $update_sql = "UPDATE doctor SET email = '$email', doctor_status = '$doctor_status' WHERE doctor_id = '$doctor_id' ";
    mysqli_query($con, $update_sql) or die(mysqli_error($con));

    header("location: doctor-profile.php");
} else {
    echo "<script> alert('Error!'); </script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
mysqli_close($con);
?>