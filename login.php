<html>
<body>
<?php
SESSION_start();
include 'connectdatabase.php';
$username = $_POST['username'];
$password = $_POST['password'];
$account_type = '';

$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$password = hash('sha256', $password);

$result = mysqli_query($con,"SELECT * FROM account WHERE BINARY username = '$username' AND  password = '$password' AND account_status = 'active'");
$count=mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if(!($count ==1)){
	if($username =="" && $password==""){
		echo "<script> alert('Enter a username and password');</script>";
		echo "<script> location.replace('index.php') </script>";
	}
	echo "<script> alert('Incorrect Username/Password'); </script>";
	echo "<script> location.replace('index.php') </script>";
	$_SESSION['can_access'] = true; 
	$_SESSION['loggedIn'] = false;
}	
else{

	$_SESSION['username'] = $username;
	$_SESSION['account_type'] = $row['account_type'];
	if($row['account_type'] == 'Admin'){
			$_SESSION['loggedIn'] = false;
		header("location: admin/index.php");
	}else if($row['account_type'] == 'Patient'){
			$_SESSION['loggedIn'] = true;
		header("location: appointment.php");
	}else {
			$_SESSION['loggedIn'] = false;
		header("location: admin/index.php");
	}
}
if (!(mysqli_query($con, $result))) {
  	die('Error: ' . mysqli_error($con));
  }

mysqli_close($con);
?>

</body>
</html>