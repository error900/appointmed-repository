<?php
include '../connectdatabase.php';
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {       
        $patient_id = $_POST['patient_id'];
        $remarks = '';
        $message = "Come back. Appointmed misses you.";
        $legend_id = "n1001";
        $indicator = "admin";
        $date_today = date('Y-m-d');

        $select = array();

        foreach ($_POST['select'] as $values) {
            $notif = "INSERT INTO notification (indicator, legend_id, patient_id, notification_date, notification) 
            VALUES('$indicator', '$legend_id','$patient_id' ,'$date_today','$message')";
            $update = "UPDATE account SET last_logged_in = '$date_today' WHERE username LIKE '$values'";
            if (!(mysqli_query($con, $notif)) || !(mysqli_query($con, $update))) {
                die('Error: ' . mysqli_error($con));
            }
        } 
        echo "<script> alert('You have warned the users');</script>";
        echo "<script> location.replace('inactive.php') </script>";
    } else {
        echo "<script> alert('Nothing selected!'); </script>";
        echo "<script> location.replace('inactive.php') </script>";
    }
} else {
    header("location: inactive.php");
    die();
}

mysqli_close($con);
?>