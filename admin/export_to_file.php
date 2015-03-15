<?php
	include '../connectdatabase.php';
	if(isset($_POST['export'])){
		ob_start();
		$filename = "Users_List.xls";
		$sql = mysqli_query($con, "SELECT * FROM account");

		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>ID</th>';
		echo '<th>Username</th>';
		echo '<th>Name</th>';
		echo '<th>Email</th>';
		echo '<th>Account Status</th>';
		echo '<th>Account Type</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		while($row = mysqli_fetch_array($sql)){
			$username  = $row['username'];
				$d_result = mysqli_query($con, "SELECT patient_id, email, patient_name FROM patient WHERE username LIKE '$username' 
				UNION (SELECT doctor_id, email, doctor_name FROM doctor WHERE username LIKE '$username') 
				UNION (SELECT secretary_id, email, secretary_name FROM secretary WHERE username LIKE '$username')" );
                $doc =  mysqli_fetch_array($d_result);
				echo '<tr>';
				echo '<td>'.$doc['patient_id'].'</td>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$doc['patient_name'].'</td>';
				echo '<td>'.$doc['email'].'</td>';
				echo '<td>'.$row['account_status'].'</td>';
				echo '<td>'.$row['account_type'].'</td>';
				echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}else{
		header("location: exportall.php");
		die();
	}
mysqli_close($con);

header("Pragma: public");
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Content-Type: application/xls');
?>