<?php
include 'connectdatabase.php';
$doc = $_POST['doctor'];
$pat = $_POST['patient'];

$sql = "DELETE FROM subscribe WHERE doctor_id LIKE '$doc' AND patient_id LIKE '$pat'";
mysqli_query($con, $sql) or die(mysqli_error());

mysqli_close($con);
//echo "<script> alert('you unsubscribed to the doctor');</script>";
echo "<script> alert('You have unsubscribed'); </script>";
echo "<script> location.replace('doctor.php?id=" . $doc . "') </script>";
//    header("location: doctor.php?id=".$doc);    
?>