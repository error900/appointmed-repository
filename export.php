<?php
if (isset($_POST['submit'])) {
    $doctor_id = $_POST['doctor_id'];
    include 'connectdatabase.php';
    $date = date('Y-m-d');
    $tomorrow = date("Y-m-d", time() + 86400);
    $appoint_sql = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif 
		WHERE doctor_id = '$doctor_id' AND appointment_status = 'Inqueue' AND appoint_date = '$date'
		ORDER BY 8 ASC, 1 ASC");
    $appoint2_sql = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif 
        WHERE doctor_id = '$doctor_id' AND appointment_status = 'Inqueue' AND appoint_date = '$tomorrow'
        ORDER BY 8 ASC, 1 ASC");

    $file_ending = "xls";
    $filename = "Schedule_List:  " . $date . ".xls";
    if(mysqli_num_rows($appoint_sql)>=1){
    echo '<table>';
    echo '<tr><td>Patient list for </td>';
    echo '<td>' . $date . '</td></tr>';
    echo '<tr>';
    echo '<th>Queue No.</th>';
    echo '<th>Patient Name</th>';
    echo '<th>Patient Contact</th>';
    echo '</tr>';
//	$file = fopen("Schedule_List.txt", "w") or die("can't open file");

    while ($app_row = mysqli_fetch_array($appoint_sql)) {
        $patient_id = $app_row['patient_id'];
        $patient_sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '$patient_id'");
        $pat_row = mysqli_fetch_array($patient_sql);
        echo '<tr>';
        echo '<td>' . $app_row['queue_id'] . '</td>';
        echo '<td>' . $pat_row['patient_name'] . '</td>';
        echo '<td>' . $pat_row['patient_contact'] . '</td>';
        echo '</tr>';
        //	$patients = "Name" .$row['patient_name']."\n"."Contact".$row['patient_contact']."\n";
        //	fwrite($file, $patients);
    }
    echo '</table>';
    }else{
        echo '<table><tr>No appointments for today</tr></table>';
    }  
    if(mysqli_num_rows($appoint2_sql)){ 
     echo '<table>';
    echo '<tr><td>Patient list for </td>';
    echo '<td>' . $tomorrow . '</td></tr>';
    echo '<tr>';
    echo '<th>Queue No.</th>';
    echo '<th>Patient Name</th>';
    echo '<th>Patient Contact</th>';
    echo '</tr>';
//  $file = fopen("Schedule_List.txt", "w") or die("can't open file");

    while ($app2_row = mysqli_fetch_array($appoint2_sql)) {
        $patient_id = $app2_row['patient_id'];
        $patient_sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id = '$patient_id'");
        $pat_row = mysqli_fetch_array($patient_sql);
        echo '<tr>';
        echo '<td>' . $app2_row['queue_id'] . '</td>';
        echo '<td>' . $pat_row['patient_name'] . '</td>';
        echo '<td>' . $pat_row['patient_contact'] . '</td>';
        echo '</tr>';
        //  $patients = "Name" .$row['patient_name']."\n"."Contact".$row['patient_contact']."\n";
        //  fwrite($file, $patients);
    }
    echo '</table>';
  }else{
        echo '<table><tr>No appointments for tomorrow</tr></table>';
    }  
} else {
    header("location: schedules.php");
    die();
}
mysqli_close($con);

header("Pragma: public");
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Type: application/xls');
?>