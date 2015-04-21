<?php
include 'connectdatabase.php';
if(isset($_POST['submit'])){
	$clinic_id = $_POST['clinic_id'];
	$doctor_id = $_POST['doctor_id'];
	if($_POST['cut_off_no'] != 0){
		$cut_off_no = $_POST['cut_off_no'];
		$cut_off = "UPDATE clinic SET cut_off_no = '$cut_off_no'WHERE clinic_id LIKE '$clinic_id'";
		mysqli_query($con, $cut_off) or die(mysqli_error($con));
	}
	//secretary
    $firstname = strtolower($_POST['firstname']);
    $lastname = strtolower($_POST['lastname']);
    $firstname = mysqli_real_escape_string($con, ucfirst($firstname));
    $lastname = mysqli_real_escape_string($con, ucfirst($lastname));
    $secretary_name = $firstname . ' ' . $lastname;
    $secretary_id = substr(md5(uniqid(rand(), true)), 0, 7);
    $n = substr($firstname, 0, 2);
    $username = $n . '' . $lastname;
    $password = $lastname;
    $password = hash('sha256', $password);

    if (!($firstname == '' && $lastname == '')) {
        $sqlaccount = "INSERT INTO account (username, password, account_type, account_status)
			VALUES('$username', '$password', 'Secretary', 'active')";
        $secretary_sql = "INSERT INTO secretary (secretary_id, secretary_name, doctor_id, username) 
			VALUES ('$secretary_id', '$secretary_name', '$doctor_id','$username')";
        if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $secretary_sql))) {
            die('Error: ' . mysqli_error($con));
        }

        $sec_clinic = "INSERT INTO clinic_sec (clinic_id, secretary_id) VALUES ('$clinic_id', '$secretary_id')";
        mysqli_query($con, $sec_clinic) or die(mysqli_error($con));
        echo "<script> alert('Added secretary for clinic'); </script>";

    }
       echo "<script> location.replace('doctor-profile.php') </script>";	
}else{
	echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
?>