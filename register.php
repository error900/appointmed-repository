
<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$contact = mysqli_real_escape_string($con, $_POST['contact']);
	$occupation = mysqli_real_escape_string($con, $_POST['occupation']);
	$firstname = strtolower($_POST['firstname']);
	$lastname = strtolower($_POST['lastname']);
	$firstname = mysqli_real_escape_string($con, ucfirst($firstname));
	$lastname = mysqli_real_escape_string($con, ucfirst($lastname));
	$patientname = $firstname . ' ' .$lastname;
	$month = $_POST['birth_month'];
	$day = $_POST['birth_day'];
	$year = $_POST['birth_year'];
	$date = date('Y-m-d');
	$message="A user has registered to the system.";
	$n_id="n1002";
	$indicator="admin";

//	$birthdate = $month .'/'.$day .'/'.$year;
	$birthdate = $year . '-'.$month.'-'.$day;
	$birthday = explode("/", $birthdate);
/*	$age = (date("md", date("U", mktime(0, 0, 0, $birthday[0], $birthday[1], $birthday[2]))) > date("md")
		  ? ((date("Y") - $birthday[2]) - 1)
		  : (date("Y") - $birthday[2]));
*/
	$account_type = 'Patient';
/*	if($age <= 12){
		$patientcategory = 'Child';
	}else{
		$patientcategory = 'Adult';
	}
*/
	include 'connectdatabase.php';
	//include 'Mail.php';
			
	$sqln = mysqli_query($con, "SELECT username FROM account WHERE username ='" .$username."' ");
	if(mysqli_num_rows($sqln) != 0){

		mysqli_close($con);
		echo "<script>alert('Username exists. Change the username')</script>";
		echo "<script> location.replace('signup.php') </script>";
	}
	//hash
	$password = hash('sha256', $password);

	//patient id
	$patientid = substr( md5(uniqid(rand(), true)), 0, 7);
	 

	$sqlaccount = "INSERT INTO account (username, password, account_type, account_status) VALUES('$username','$password', '$account_type','inactive')";
	$sqlpatient = "INSERT INTO patient (patient_id, username, email, patient_contact, occupation, birthdate, patient_name) 
		VALUES('$patientid','$username','$email', '$contact','$occupation','$birthdate','$patientname')";

	$notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
	VALUES('$indicator','', '', '$n_id', '$date', '$message')";
	mysqli_query($con, $notif) or die (mysqli_error($con));


	if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $sqlpatient))) {
	  	die('Error: ' . mysqli_error($con));
	  }

	echo "<script> alert('Your account is to be activated'); </script>";
	echo "<script> location.replace('index.php') </script>";
	
} else{
	header("location: signup.php");
	die();
}
	mysqli_close($con);
?>