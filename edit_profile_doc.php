<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $specialization = mysqli_real_escape_string($con, $_POST['specialization']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $doctor_id = $_POST['doctor_id'];
    $doctor_status = $_POST['doctor_status'];
    $date = date('Y-m-d');

    //clinic
    $clinic_name = mysqli_real_escape_string($con, $_POST['clinic_name']);
    $clinic_location = mysqli_real_escape_string($con, $_POST['clinic_location']);
    $clinic_contact = mysqli_real_escape_string($con, $_POST['clinic_contact']);

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

    //notification
    $status = mysqli_query($con, "SELECT doctor_status, doctor_name FROM doctor WHERE doctor_id LIKE '$doctor_id'");
    $subscribed = mysqli_query($con, "SELECT patient_id FROM subscribe WHERE doctor_id LIKE '$doctor_id'");
    $status_row = mysqli_fetch_array($status);
    if ($doctor_status != $status_row['doctor_status']) {
        echo $doctor_status;
        echo $status_row['doctor_status'];
        $message = "Doctor " . $status_row['doctor_name'] . " has changed his/her status to " . $doctor_status;
        $n_id = "n1004";
        $indicator = "doctor";
        while ($get_subscribed = mysqli_fetch_array($subscribed)) {
            $subscribers = $get_subscribed['patient_id'];
            $notif = "INSERT INTO notification (indicator, doctor_id, patient_id, legend_id, notification_date, notification) 
				VALUES('$indicator','$doctor_id', '$subscribers', '$n_id', '$date', '$message')";
            mysqli_query($con, $notif) or die(mysqli_error($con));
        }
    }

    //clinic
    if (!($clinic_name == '' && $clinic_contact == '' && $clinic_location == '')) {
        $clinic_sql = "INSERT INTO clinic (clinic_location, clinic_name, clinic_contact, doctor_id) 
			VALUES ('$clinic_location', '$clinic_name', '$clinic_contact','$doctor_id')";
        if (!(mysqli_query($con, $clinic_sql))) {
            die('Error: ' . mysqli_error($con));
        }
    }

    //secretary
    if (!($firstname == '' && $lastname == '')) {
        $sqlaccount = "INSERT INTO account (username, password, account_type, account_status)
			VALUES('$username', '$password', 'Secretary', 'active')";
        $secretary_sql = "INSERT INTO secretary (secretary_id, secretary_name, doctor_id, username) 
			VALUES ('$secretary_id', '$secretary_name', '$doctor_id','$username')";
        if (!(mysqli_query($con, $sqlaccount)) || !(mysqli_query($con, $secretary_sql))) {
            die('Error: ' . mysqli_error($con));
        }
    }
    $update_sql = "UPDATE doctor SET specialization = '$specialization', email = '$email', doctor_status = '$doctor_status' WHERE doctor_id = '$doctor_id' ";
    if (!(mysqli_query($con, $update_sql))) {
        die('Error: ' . mysqli_error($con));
    }

    header("location: doctor-profile.php");
} else {
    echo "<script> alert('Error'); </script>";
    echo "<script> location.replace('doctor-profile.php') </script>";
}
mysqli_close($con);
?>