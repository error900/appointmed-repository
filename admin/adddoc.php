<?php

include '../connectdatabase.php';
if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $specialization = $_POST['specialization'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $firstname = strtolower($_POST['firstname']);
    $lastname = strtolower($_POST['lastname']);
    $firstname = ucfirst($firstname);
    $lastname = ucfirst($lastname);
    $name = $firstname . ' ' . $lastname;
    $password = $lastname;
    $password = hash('sha256', $password);

    $sqlcheckusername = mysqli_query($con, "SELECT username FROM account WHERE username ='" . $username . "' ");
    if (mysqli_num_rows($sqlcheckusername) != 0) {

        mysqli_close($con);
        echo "<script>alert('Username exists. Change the username')</script>";
        echo "<script> location.replace('popdoc.php') </script>";
    }
    $doctorid = substr(md5(uniqid(rand(), true)), 0, 7);

    $sqlaccount = "INSERT INTO account (username, password, account_type, account_status)
		VALUES('$username', '$password', 'DOCTOR', 'active')";
    $sqldoctor = "INSERT INTO doctor (doctor_id, doctor_name, specialization, doctor_status, email, username) 
		VALUES('$doctorid','$name', '$specialization','$status', '$email', '$username')";

    if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $sqldoctor))) {
        die('Error: ' . mysqli_error($con));
    }
    header("location: dashboard.php");
} else {
    header("location: index.php");
    die();
}
mysqli_close($con);
?>