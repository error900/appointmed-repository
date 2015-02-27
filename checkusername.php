<?php
include 'connectdatabase.php';
if(isset($_POST['username'])){
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//trim and lowercase username
	$username =  strtolower(trim($_POST["username"])); 
	
	//sanitize username
	$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	//check username in db
	$results = mysqli_query($con, "SELECT username FROM account WHERE username='$username'");
	
	//return total count
	$username_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, username is not available
	if($username_exist) {
		die('<img src="img/not-available.png" />');
	}else{
		die('<img src="img/available.png" />');
	}
mysqli_close($con);
}

?>