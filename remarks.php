<?php
	include 'connectdatabase.php';
	if(isset($_POST['submit'])){
		$remark = $_POST['remarks'];
		$complete = $_POST['isComplete'];

	}else{
		echo "<script> alert('Error!); </script>";
		echo "<script> location.replace('schedules.php') </script>";
	}

	mysqli_close($con);

?>