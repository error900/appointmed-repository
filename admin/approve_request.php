<?php

include '../connectdatabase.php';
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {
        $select = array();

        foreach ($_POST['select'] as $values) {
            $sql = "UPDATE account SET account_status='active', password='$password' WHERE username = '$values'";

            if (!(mysqli_query($con, $sql))) {
                die('Error: ' . mysqli_error($con));
            }
            
        } header("location: approve.php");
    } else {
        echo "<script> alert('Nothing selected!'); </script>";
        echo "<script> location.replace('approve.php') </script>";
    }
} else {
    header("location: approve.php");
    die();
}

mysqli_close($con);
?>