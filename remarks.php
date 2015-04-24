<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);
    $pat = $_POST['patient_id'];
    $doc = $_POST['doctor_id'];
    $status = $_POST['isComplete'];
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE appointment SET remarks = '$remarks', appointment_status = '$status' WHERE appointment_id = '$appointment_id' ";

    //patient
    $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient_id'" );
    $p_row =  mysqli_fetch_array($p_result);

    // email remarks to patients email
    $email = $p_row['email'];
    $subject = 'Remarks for your appointment';
    $headers = 'From: Benguet Labs';


    if ($status == 'Completed') {
        $date = date("Y-m-d");
        $indicator = "doctor";
        $n_id = "n1003";
        $message = "Your appointment is finished.";
        if ($remarks != '') {
            $message = "<strong>Your appointment is done!</strong><br/><strong>Remarks:</strong>" . $remarks;
        }
        $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
			VALUES('$indicator','$doc', '$pat', '$n_id', '$date', '$message')";
        mysqli_query($con, $notif) or die(mysqli_error($con));

        $sendmail = mail($email, $subject, $remarks, $headers);
    }

    if (!(mysqli_query($con, $sql))) {
        die('Error: ' . mysqli_error($con));
    }
    header("location: schedules.php");
} else {
    echo "<script> alert('Error!); </script>";
    echo "<script> location.replace('schedules.php') </script>";
}
mysqli_close($con);
?>