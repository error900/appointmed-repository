<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $doc = $_POST['doctor_id'];
    $status = $_POST['isComplete'];
    $walk_in = $_POST['walk_in'];
    // echo $walk_in;
    $sql = "UPDATE walk_in SET appointment_status = '$status' WHERE walk_in LIKE '$walk_in' AND doctor_id LIKE '$doc'";
    if (!(mysqli_query($con, $sql))) {
        die('Error: ' . mysqli_error($con));
    }
    if($account_type = 'Doctor')
        header("location: schedules.php");
    else
        header("location: st-schedules.php");
} else {
    echo "<script> alert('Error!); </script>";
    echo "<script> location.replace('schedules.php') </script>";
}
mysqli_close($con);
?>