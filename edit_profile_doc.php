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

    // Put to next day      start
    if (($doctor_status != $status_row['doctor_status']) && ($doctor_status == 'Out')){
        $app = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appoint_date LIKE '$date' AND appointment_status = 'Inqueue'");

        $clinic = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $clinic_rows = mysqli_fetch_array($clinic);
        $clinic_id = $clinic_rows['clinic_id'];

        $select_clinic = mysqli_query($con, "SELECT * FROM clinic_schedule NATURAL JOIN clinic WHERE clinic_id LIKE '$clinic_id'");
        $select_clinic_rows = mysqli_fetch_array($select_clinic);
        $days = $select_clinic_rows['days'];

        $days = explode('/', $days);
        foreach($days as $value){
            $val = (ucfirst(strtolower($value)));
            array_push($days, $val);
        }

        $check_day = date('D', strtotime($date));

        $queue = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$date' ORDER BY queue_id DESC") or die(mysqli_error($con));
        $queue_no = mysqli_fetch_array($queue);

        $queue_id = (int)$queue_no['queue_id'];

        if(in_array($check_day, $days)){
            $key = array_search($check_day, $days);
            $next = $key+1;
            $newdate = strtotime ('next '.$days[$next],strtotime($date));
            $newdate = date ('Y-m-d' , $newdate);

            while($app_result = mysqli_fetch_array($app)){
                $app_id = $app_result['appointment_id'];
                $update_appointment = "UPDATE appointment SET appoint_date = '$newdate' WHERE appointment_id LIKE '$app_id'";
                mysqli_query($con, $update_appointment) or die (mysqli_error($con));

                $update_queue= "UPDATE queue_notif SET appoint_date = '$newdate' WHERE appointment_id LIKE '$app_id'";
                mysqli_query($con, $update_queue) or die (mysqli_error($con));

                //start
                /*sql_i = mysqli_query($con, "SELECT appointment_id FROM appointment WHERE doctor_id LIKE '$doctor_id' AND patient_id 
                    LIKE '$patient_id' AND appoint_date LIKE '$date' ");
                $sql_fetch = mysqli_fetch_array($sql_i);
                $appointment_id = $sql_fetch['appointment_id'];*/

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
                        VALUES ('$count','$clinic_id','$app_id','$date')";

                if (!(mysqli_query($con, $queue_r))) {
                    die('Error: ' . mysqli_error($con));
                }        
                //end
            }
        }
    }
    // end


    if(!($specialization == '')){
        $specialization = ucfirst(strtolower($specialization));
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