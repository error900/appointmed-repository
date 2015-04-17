<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $appdate = $_POST['appdate'];
    $pat = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $appid = $_POST['appointment_id'];
    $days = $_POST['days'];
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

    $queue_fi = mysqli_query($con, "SELECT * FROM queue_notif WHERE appointment_id LIKE '$appid' ");
    $queue = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$appdate'");
    $queue_no = mysqli_fetch_array($queue);

    $queue_row = mysqli_fetch_array($queue_fi);
    $queue_id = (int)$queue_no['queue_id'];
    $queue_date = $queue_row['appoint_date'];
    
    $days = explode('/', $days);
    $check_date = date('D', strtotime($appdate));
    if(!(in_array($check_date, $days))){
        echo '<script>alert("The clinic is not available at the selected day. Please change the date")</script>';
        echo "<script> location.replace('doctor.php?id=" . $doctor_id . "') </script>";
    }else if ($limit_row >= 7) {
        echo '<script>alert("Reached the maximum number of patients for the day. Please change the date")</script>';
        echo "<script> location.replace('appointment.php') </script>";
    } else if ($single_count != 0) {
        echo '<script>alert("Cannot schedule for the same doctor in a single day. Please change the date")</script>';
        echo "<script> location.replace('appointment.php') </script>";
    } else if (($appdate > $current_date) && (($limit_row < 7) && ($single_count == 0))) {
        $sql = "UPDATE appointment SET appoint_date = '$appdate' WHERE appointment_id= $appid";

        $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
		VALUES('$indicator','$doctor_id', '$pat', '$n_id', '$current_date', '$message')";

        if (!(mysqli_query($con, $sql)) || !(mysqli_query($con, $notif))) {
            die('Error: ' . mysqli_error($con));
        }
        
        //start

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
        if(mysqli_num_rows($queue)== 0){
            $count = 1;
        }else if(mysqli_num_rows($queue) !=0){
            $queue_id = (int)$queue_no['queue_id'];
            $count = $queue_id +1;
        }
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