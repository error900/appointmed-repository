<?php
include 'connectdatabase.php';
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$username = $_POST['username'];
//$new_password = $_POST['password2'];
$sql_pass = mysqli_query($con, "SELECT password FROM account WHERE username LIKE '$username'");
$row_pass = mysqli_fetch_array($sql_pass);
$old_pass = $row_pass['password'];

if($old_password != $old_pass){
	echo "<script> alert('Incorrect password!'); </script>";
    echo "<script> location.replace('doc_changepassword.php') </script>";
}else{
	
}	


?>