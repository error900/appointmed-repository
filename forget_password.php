<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
  $password = substr(md5(uniqid(rand(), true)), 0, 7);
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $patient = mysqli_query($con, "SELECT * FROM patient WHERE email ='$email'");
  if (mysqli_num_rows($patient) == 0) {
        mysqli_close($con);
        echo "<script>alert('Email does not exist')</script>";
        echo "<script> location.replace('signup.php') </script>";
  }
  $p_row =  mysqli_fetch_array($patient);
  $username = $p_row['username'];


  $subject = 'Password reset';
  $message = '
    '.$username.',

    You requested for your password. Your new password is: '.$password .'

    You may now login using your new password.

    ';
  $headers = 'From: Benguet Labs';
  $password = hash('sha256', $password);

  $sql = "UPDATE account SET password='$password' WHERE username = '$username'";
  if (!(mysqli_query($con, $sql))) {
      die('Error: ' . mysqli_error($con));
  }

  $sendmail = mail($email, $subject, $message, $headers);
  
  echo "<script> location.replace('signup.php') </script>";

} else {
    header("location: signup.php");
    die();
}
mysqli_close($con);
?>