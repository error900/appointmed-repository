<?php
include '../connectdatabase.php';
if (isset($_POST['doctor']) && isset($_POST['clinic'])){
	$doctor_id = $_POST['doctor'];
    $clinic_id = $_POST['clinic'];
    $doctor_status = $_POST['doctor_status'];

	//notification
	$status = mysqli_query($con, "SELECT doctor_status, doctor_name FROM doctor WHERE doctor_id LIKE '$doctor_id'");
	$subscribed = mysqli_query($con, "SELECT patient_id FROM subscribe WHERE doctor_id LIKE '$doctor_id'");
	$status_row = mysqli_fetch_array($status);
	if ($doctor_status != $status_row['doctor_status']) {
	    $message = "Doctor " . $status_row['doctor_name'] . " has his/her status changed to " . $doctor_status;
	    $n_id = "n1004";
	    $indicator = "doctor";
	    while ($get_subscribed = mysqli_fetch_array($subscribed)) {
	        $subscribers = $get_subscribed['patient_id'];
	        $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
				VALUES('$indicator','$doctor_id', '$subscribers', '$n_id', '$date', '$message')";
	        mysqli_query($con, $notif) or die(mysqli_error($con));
	    }
	}

	$update_sql = "UPDATE doctor SET doctor_status = '$doctor_status' WHERE doctor_id = '$doctor_id' ";
    mysqli_query($con, $update_sql) or die(mysqli_error($con));

     header("location: inqueue-details.php?did=".$doctor_id."&cid=".$clinic_id." ");
} else {
    echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('inqueue-details.php?did='".$doctor_id."&cid=".$clinic_id."') </script>";
}
?>