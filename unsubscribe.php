<?php 
   include 'connectdatabase.php';
    $doc = $_POST['doctor'];
    $pat = $_POST['patient'];
    echo $doc;
    echo $pat;

    $sql = "DELETE FROM subscribe WHERE doctor_id LIKE '$doc' AND patient_id LIKE '$pat'";
    mysqli_query($con, $sql) or die (mysqli_error());

    mysqli_close($con);
    echo "<script> alert('you unsubscribed to the doctor');</script>";
<<<<<<< HEAD
    header("location: doctor.php");    
=======
    header("location: profile.php");    
>>>>>>> origin/master
?>