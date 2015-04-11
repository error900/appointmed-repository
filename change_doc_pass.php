<?php
include 'connectdatabase.php';
$old_password = mysqli_real_escape_string($con, $_POST['old_password']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$username = mysqli_real_escape_string($con, $_POST['username']);
//$new_password = $_POST['password2'];
$sql_pass = mysqli_query($con, "SELECT password FROM account WHERE username LIKE '$username'");
$row_pass = mysqli_fetch_array($sql_pass);
$old_pass = $row_pass['password'];

$password = hash('sha256', $password);
$old_password = hash('sha256', $old_password);

if($old_password != $old_pass){
	echo "<script> alert('Incorrect password!'); </script>";
    echo "<script> location.replace('doc_changepassword.php') </script>";
}else{
	$update_pass = "UPDATE account SET password = '$password' WHERE username LIKE '$username' ";
	if (!(mysqli_query($con, $update_pass))) {
            die('Error: ' . mysqli_error($con));
    }
    header("location: doctor-profile.php");
}	


?>