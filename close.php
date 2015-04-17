<?php
include 'connectdatabase.php';
$app_id = mysqli_real_escape_string($con, $_GET['id']);
$appointment_status = 'Cancelled';
$date = date('Y-m-d');
$doc = mysqli_real_escape_string($con, $_GET['doc']);
$pat = mysqli_real_escape_string($con, $_GET['pat']);
$message = "A patient has cancelled his appointment.";
$n_id = "n1004";
$indicator = "patient";
$clinic_id = mysqli_real_escape_string($con, $_GET['cid']);
$queue_id = mysqli_real_escape_string($con, $_GET['qid']);
$queue_date = mysqli_real_escape_string($con, $_GET['qd']);

$sql_c = mysqli_query($con, "SELECT * FROM queue_notif 
    WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$queue_date' AND queue_id > '$queue_id' ");
    if(mysqli_num_rows($sql_c)!= 0){
        while($sql_notif = mysqli_fetch_array($sql_c)){
			$count_r = (int) $sql_notif['queue_id'];
            $appointment_id = $sql_notif['appointment_id'];
            $count_r = $count_r -1;
            $subtract_queue_number = "UPDATE queue_notif SET queue_id = '$count_r' 
            WHERE appointment_id LIKE '$appointment_id'";
            mysqli_query($con, $subtract_queue_number) or die(mysqli_error($con));
    	}
    }

$delete_sql = "DELETE FROM queue_notif WHERE appointment_id = '$app_id'";
mysqli_query($con, $delete_sql) or die(mysqli_error($con));

$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
	VALUES('$indicator','$doc', '$pat', '$n_id', '$date', '$message')";
mysqli_query($con, $notif) or die(mysqli_error($con));

$sql = "UPDATE appointment SET appointment_status ='Cancelled' WHERE appointment_id = '$app_id' ";
$sql2 = "INSERT INTO appointment_history (description, appointment_id) 
	VALUES ('Cancelled', '$app_id')";
mysqli_query($con, $sql) or die(mysqli_error());
mysqli_query($con, $sql2) or die(mysqli_error($con));

header("location: appointment.php");

mysqli_close($con);
?>