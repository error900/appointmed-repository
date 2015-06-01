<?php
include '../connectdatabase.php';
if(isset($_GET['did']) && isset($_GET['cid'])){
	$doctor_id = $_GET['did'];
	$clinic_id = $_GET['cid'];
	$date = date('Y-m-d');
	$sql = mysqli_query($con, "SELECT * FROM queue_notif WHERE clinic_id LIKE '$clinic_id' 
		AND appoint_date LIKE '$date' ORDER BY 1 DESC");
	$row = mysqli_fetch_array($sql);

	$walk = mysqli_query($con, "SELECT walk_in_id FROM walk_in  WHERE clinic_id LIKE '$clinic_id' 
		AND appointW_date LIKE '$date' ORDER BY 1 DESC");
	$row2 = mysqli_fetch_array($walk);
	
	$queue_id = $row['queue_id'];
	$walk_in_id = $row2['walk_in_id'];
	if(mysqli_num_rows($sql)== 0){
		if(mysqli_num_rows($walk)>=1){
			$count = $walk_in_id + 1;
		}else
    		$count = 1;
    }else if(mysqli_num_rows($sql) !=0){
	    if($queue_id < $walk_in_id){
            $queue_id = $walk_in_id;
        }else if($queue_id > $walk_in_id){
            $queue_id = $queue_id;
        }
    	$count = $queue_id +1;
    }
    $walk_in_id = $count;

	$insert_sql = "INSERT INTO walk_in (walk_in_id, clinic_id, appointW_date, doctor_id, appointmentW_status) 
	VALUES ('$walk_in_id','$clinic_id','$date','$doctor_id','Inqueue')";
    if (!(mysqli_query($con, $insert_sql))) {
    	die('Error: ' . mysqli_error($con));
	}
    echo "<script> alert('Added walk in patient');</script>";
    echo "<script> location.replace('index.php') </script>";
}else{
	echo "<script> alert('Error!');</script>";
    echo "<script> location.replace('index.php') </script>";
}
mysqli_close($con);
?>