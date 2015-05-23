<?php
include 'connectdatabase.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $doctor_id = $_POST['doctor_id'];
    $secretary_id = $_POST['secretary_id'];
    $doctor_status = $_POST['doctor_status'];
    $date = date('Y-m-d');

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

    $update_sql = "UPDATE secretary SET secretary_name = '$name', email = '$email'WHERE secretary_id = '$secretary_id' ";
    if (!(mysqli_query($con, $update_sql))) {
        die('Error: ' . mysqli_error($con));
    }
    $update_spec_sql = "UPDATE doctor SET doctor_status = '$doctor_status' ";
    if (!(mysqli_query($con, $update_spec_sql))) {
        die('Error: ' . mysqli_error($con));
    }

    header("location: secretary-profile.php");
} else {
    echo "<script> alert('Error'); </script>";
    echo "<script> location.replace('secretary-profile.php') </script>";
}
mysqli_close($con);
?>