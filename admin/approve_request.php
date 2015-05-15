<?php

include '../connectdatabase.php';
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {
        $select = array();
        $password = substr(md5(uniqid(rand(), true)), 0, 7);
        $password = hash("sha256", $password);
        
        foreach ($_POST['select'] as $values) {
            $sql = "UPDATE account SET account_status='active', password='$password' WHERE username = '$values'";


            $patient = mysqli_query($con, "SELECT * FROM patient WHERE username ='$values'");
            $p_row =  mysqli_fetch_array($patient);

            //email password
            $email =  $p_row['email'];
            $message = '
            '.$values.',

            Thank You for Registering to Appointmed.

            username: '.$values.'
            password: '.$password.' 

            You may now login to Appointmed using your username and password.
            ';
            $subject = 'Password of you account ';
            $headers = 'From: Benguet Labs';

            if (!(mysqli_query($con, $sql))) {
                die('Error: ' . mysqli_error($con));
            }
            $sendmail = mail($email, $subject, $message, $headers);
            
        } header("location: approve.php");
    } else {
        echo "<script> alert('Nothing selected!'); </script>";
        echo "<script> location.replace('approve.php') </script>";
    }
} else {
    header("location: approve.php");
    die();
}

mysqli_close($con);
?>