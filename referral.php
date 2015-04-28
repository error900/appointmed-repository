<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $date = date('Y-m-d');
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $referred_id = $_POST['referred_id'];
    $appointment_id = $_POST['appointment_id'];
    $status = "Referred";

    $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient_id'" );
    $p_row =  mysqli_fetch_array($p_result);
    $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'");
    $d_row = mysqli_fetch_array($d_result);
    $rd_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$referred_id'");
    $rd_row = mysqli_fetch_array($rd_result);

    //patient
    $email = $p_row['email'];
    $subject = 'Appointmed reffered to another Doctor';
    $headers = 'From: Benguet Labs';
    $p_message = '
    '.$p_row['patient_name'].',

    Your appointment with Dr. '.$d_row['doctor_name'].' has been cancelled. You have been referred to Dr. '.$rd_row['doctor_name'].'. 
    You can create a new apoointment with Dr. '.$rd_row['doctor_name'].'.
    ';

    //doctor
    $d_email = $rd_row['email'];
    $d_subject = 'Patient referred';
    $d_headers = 'From: Benguet Labs';
    $d_message =  '
    '.$rd_row['doctor_name'].',

    A patient was referred to you by Dr. '.$d_row['doctor_name'].'.


    ';


    //patient notification
    $message="You have been referred by Dr. ".$d_row['doctor_name']." to <strong><a href=\"doctor.php?id=".$referred_id."\">Dr. ".$rd_row['doctor_name']."</a></strong>";
    $n_id="n1002";
    $indicator="doctor";
    $notif_patient = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
    VALUES('$indicator','$doctor_id', '$patient_id', '$n_id', '$date' , '$message')";
    mysqli_query($con, $notif_patient) or die (mysqli_error($con));
    //patient notification end


    //doctor notification
    $message= $p_row['patient_name']." has been referred to you by Doctor ".$d_row['doctor_name'].".";
    $n_id="n1002";
    $indicator="patient";
    $notif_doctor = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
    VALUES('$indicator','$referred_id', '$patient_id', '$n_id', '$date' , '$message')";
    mysqli_query($con, $notif_doctor) or die (mysqli_error($con));
    //doctor notification end


    // appointment_history
    $appointment_history = "INSERT INTO appointment_history (description, appointment_id)
    VALUES('$status', '$appointment_id')";


    $update_appointment = "UPDATE appointment SET doctor_id = '$referred_id', appointment_status = 'Referred' WHERE appointment_id = '$appointment_id'";
    //$delete_appointment = "DELETE FROM appointment WHERE appointment_id = '$appointment_id'";
    $sql = "INSERT INTO refer_patient (patient_id, original_doctor, substitute_doctor) VALUES('$patient_id','$doctor_id', '$referred_id')";

    if (!(mysqli_query($con, $sql)) || !(mysqli_query($con, $appointment_history)) || !(mysqli_query($con, $update_appointment))) {
        die('Error: ' . mysqli_error($con));
    } else {
        $sendmail = mail($email, $subject, $p_message, $headers);
        $d_sendmail = mail($d_email, $d_subject, $d_message, $d_headers);
    }
    header("location: schedules.php");
} else
    echo "<script>alert('Error')</script>";
mysqli_close($con);
?>
