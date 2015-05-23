<?php
include 'connectdatabase.php';
if(isset($_POST['doctor']) && isset($_POST['patient'])){
    $doc = $_POST['doctor'];
    $pat = $_POST['patient'];

    $sql2 = mysqli_query($con, "SELECT * FROM subscribe WHERE doctor_id LIKE '$doc' AND patient_id LIKE '$pat'");
    $count = mysqli_num_rows($sql2);

    if ($count >= 1) {
        //echo "<script> alert('you are already subscribed to this doctor');</script>";

        echo "<script> alert('You are already subscribed'); </script>";
        echo "<script> location.replace('doctor.php?id=" . $doc . "') </script>";
    } else {
        $sql = "INSERT INTO subscribe (doctor_id, patient_id) 
            VALUES ('$doc', '$pat')";

        mysqli_query($con, $sql) or die(mysqli_error());
        header("location: doctor.php?id=" . $doc);
        //echo "<script> alert('you are subscribed');</script>";
        //echo "<script> alert('you are subscribed');</script>";
        //header("location: doctor.php?id=".$doc);
    }
}else{
    echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('appointment.php') </script>";
}
mysqli_close($con);
?>