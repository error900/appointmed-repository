<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $appdate = $_POST['appdate'];
    $pat = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appid = $_POST['appointment_id'];
    $appdate = date('Y-m-d', strtotime($appdate));
    $current_date = date('Y-m-d');
    $patient_id = $_POST['patient_id'];
    $clinic_id = $_POST['clinic_id'];

    $message = "A patient has rescheduled his appointment to you.";
    $n_id = "n1002";
    $indicator = "patient";

    $limit_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appoint_date LIKE '$appdate' AND appointment_status <> 'Cancelled'");
    $limit_row = mysqli_num_rows($limit_result);

    $app_d = mysqli_fetch_array($limit_result);

    $single_result = mysqli_query($con, "SELECT COUNT(*) AS count FROM appointment WHERE doctor_id LIKE '$doctor_id' 
		AND patient_id LIKE '$patient_id' AND (appoint_date LIKE '$appdate' AND appointment_status <> 'Cancelled')");
    $single_row = mysqli_fetch_array($single_result);
    $single_count = $single_row['count'];

    $queue = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$appdate'");
    $queue_no = mysqli_fetch_array($queue);
    echo mysqli_num_rows($queue);
    if ($limit_row >= 7) {
        echo '<script>alert("Reached the maximum number of patients for the day. Please change the date")</script>';
        echo "<script> location.replace('appointment.php') </script>";
    } else if ($single_count != 0) {
        echo '<script>alert("Cannot schedule for the same doctor in a single day. Please change the date")</script>';
        echo "<script> location.replace('appointment.php') </script>";
    } else if (($appdate >= $current_date) && (($limit_row < 7) && ($single_count == 0))) {
        $sql = "UPDATE appointment SET appoint_date = '$appdate' WHERE appointment_id= $appid";

        $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
		VALUES('$indicator','$doctor_id', '$pat', '$n_id', '$current_date', '$message')";

        if (!(mysqli_query($con, $sql)) || !(mysqli_query($con, $notif))) {
            die('Error: ' . mysqli_error($con));
        }
        
        //start
        if(mysqli_num_rows($queue)== 0){
            $count = 1;
            echo $count;
            echo 'haan';
        }else if(mysqli_num_rows($queue) !=0){
            $queue_id = (int)$queue_no['queue_id'];
            $count = $queue_id +1;
            echo $count;
            echo 'wen';
        }
     //   $queue_r = "INSERT INTO queue_notif (queue_id, clinic_id, appointment_id, appoint_date)
     //          VALUES ('$count','$clinic_id','$appointment_id','$date')";
     //update query
        $queue_r = "UPDATE queue_notif SET queue_id = '$count', appoint_date = '$appdate' WHERE appointment_id LIKE '$appid' ";
        if (!(mysqli_query($con, $queue_r))) {
            die('Error: ' . mysqli_error($con));
        }        
        //end
        header("location: appointment.php");
    } else {
        echo '<script>alert("Please change the date")</script>';
        echo "<script> location.replace('appointment.php') </script>";
    }
} else
    echo "<script>alert('Error')</script>";

mysqli_close($con);

?>