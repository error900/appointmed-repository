<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $date = $_POST['date'];
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $clinic_id = $_POST['clinic_id'];

    $appointment_status = "Inqueue";
    $remarks = '';
    $message = "A patient has requested an appointment.";
    $legend_id = "n1004";
    $indicator = "patient";
    $date = date('Y-m-d', strtotime($date));
    $date_today = date('Y-m-d');

    $select_clinic = mysqli_query($con, "SELECT * FROM clinic_schedule NATURAL JOIN clinic WHERE clinic_id LIKE '$clinic_id'");
    $select_clinic_rows = mysqli_fetch_array($select_clinic);
    $days = $select_clinic_rows['days'];
    $cut_off_no = $select_clinic_rows['cut_off_no'];

    $limit_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appoint_date LIKE '$date'");
    $limit_row = mysqli_num_rows($limit_result);

    $single_result = mysqli_query($con, "SELECT COUNT(*) AS count FROM appointment WHERE doctor_id LIKE '$doctor_id' 
		AND patient_id LIKE '$patient_id' AND (appoint_date LIKE '$date' AND appointment_status <> 'Cancelled')");
    $single_row = mysqli_fetch_array($single_result);
    $single_count = $single_row['count'];

    $queue = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$date' ORDER BY queue_id DESC") or die(mysqli_error($con));
    $queue_no = mysqli_fetch_array($queue);

    $queue_id = (int)$queue_no['queue_id'];

    //walk in
    $walk_in = mysqli_query($con, "SELECT * FROM walk_in WHERE clinic_id LIKE '$clinic_id' AND appointW_date LIKE '$date' ORDER BY 1 DESC");
    $walk_in_row = mysqli_fetch_array($walk_in);
    $walk_in_id = $walk_in_row['walk_in_id']; 
    //end

    $days = explode('/', $days);
    foreach($days as $value){
        $val = (ucfirst(strtolower($value)));
        array_push($days, $val);
    }
    $check_date = date('D', strtotime($date));

    if(!(in_array($check_date, $days))){
        echo '<script>alert("The clinic is not available at the selected day. Please change the date")</script>';
        echo "<script> location.replace('doctor.php?id=" . $doctor_id . "') </script>";
    }else if ($limit_row >= $cut_off_no) {
        echo '<script>alert("Reached the maximum number of patients for the day. Please change the date")</script>';
        echo "<script> location.replace('doctor.php?id=" . $doctor_id . "') </script>";
    } else if ($single_count != 0) {
        echo '<script>alert("Cannot schedule for the same doctor in a single day. Please change the date")</script>';
        echo "<script> location.replace('doctor.php?id=" . $doctor_id . "') </script>";
    } else if (($date >= $date_today) && (($limit_row < 7) && ($single_count == 0))) {
        $sql = "INSERT INTO appointment (doctor_id, patient_id, appoint_date, appointment_status, remarks, clinic_id) 
		VALUES('$doctor_id', '$patient_id', '$date', '$appointment_status', '$remarks','$clinic_id')";

        $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
		VALUES('$indicator', '$doctor_id', '$patient_id', '$legend_id', '$date_today','$message')";


        if (!(mysqli_query($con, $sql)) || !(mysqli_query($con, $notif))) {
            die('Error: ' . mysqli_error($con));
        }

        //start
        $sql_i = mysqli_query($con, "SELECT appointment_id FROM appointment WHERE doctor_id LIKE '$doctor_id' AND patient_id 
            LIKE '$patient_id' AND appoint_date LIKE '$date' ");
        $sql_fetch = mysqli_fetch_array($sql_i);
        $appointment_id = $sql_fetch['appointment_id'];

        if(mysqli_num_rows($queue)== 0){
            if((mysqli_num_rows($walk_in))>=1){
                $count = $walk_in_id + 1;
            }else
                $count = 1;
        }else if(mysqli_num_rows($queue) !=0){
            if($queue_id < $walk_in_id){
                $queue_id = $walk_in_id;
            }else if($queue_id > $walk_in_id){
                $queue_id = $queue_id;
            }
            $count = $queue_id +1;
        }

        $queue_r = "INSERT INTO queue_notif (queue_id, clinic_id, appointment_id, appoint_date)
                VALUES ('$count','$clinic_id','$appointment_id','$date')";

        if (!(mysqli_query($con, $queue_r))) {
            die('Error: ' . mysqli_error($con));
        }        
        //end
        header("location: appointment.php");
    } else {
        echo '<script>alert("Please change the date")</script>';
        echo "<script> location.replace('doctor.php?id=" . $doctor_id . "') </script>";
    }
} else {
    echo "<script>alert('Error')</script>";
}
    mysqli_close($con);
?>