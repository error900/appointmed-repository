<?php
include '../connectdatabase.php';
if(isset($_GET['wid'])){
    $appointment_status = 'Cancelled';
    $date = date('Y-m-d');
    $doctor_id = mysqli_real_escape_string($con, $_GET['doc']);
    $clinic_id = mysqli_real_escape_string($con, $_GET['cid']);
    $walk_in = mysqli_real_escape_string($con, $_GET['wid']);

    $sql_c = mysqli_query($con, "SELECT * FROM queue_notif 
        WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE CURDATE() AND queue_id > '$walk_in_id' ");
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
    $sql_d = mysqli_query($con, "SELECT * FROM walk_in WHERE clinic_id LIKE '$clinic_id' AND appointW_date 
        LIKE '$queue_date' AND walk_in_id > '$walk_in_id' ");
    if(mysqli_num_rows($sql_d)!= 0){
        while($sql_walk_in = mysqli_fetch_array($sql_d)){
            $count_r = (int) $sql_walk_in['walk_in_id'];
            $walk_id = $sql_walk_in['walk_in'];
            $count_r = $count_r -1;
            $subtract_queue_number = "UPDATE walk_in SET walk_in_id = '$count_r' 
            WHERE walk_in LIKE '$walk_id'";
            mysqli_query($con, $subtract_queue_number) or die(mysqli_error($con));
        }
    }

    $sql = "UPDATE walk_in SET appointmentW_status ='Cancelled' WHERE walk_in = '$walk_in' ";
    mysqli_query($con, $sql) or die(mysqli_error());

    header("location: inqueue-details.php?did=".$doctor_id."&cid=".$clinic_id." ");
    }else{
        echo "<script> alert('Error!');</script>";
        echo "<script> location.replace('inqueue-details.php') </script>";
    }
mysqli_close($con);
?>