<html>
	<body>
	<?php
	SESSION_start();
	include '../connectdatabase.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$account_type = '';

	$username = stripslashes($username);
	$password = stripslashes($password);


	$result = mysqli_query($con,"SELECT * FROM account WHERE BINARY username = '$username' AND BINARY password = '$password' ");
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
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['account_type'] = $row['account_type'];
		if($row['account_type'] == 'Admin'){
			header("location: dashboard.php");
		}else if($row['account_type'] == 'Patient'){
			header("location: index.php");
		}else 
			header("location: ../schedules.php");

	  }
	mysqli_close($con);
	?>

	</body>
</html>