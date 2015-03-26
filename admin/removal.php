<?php

include '../connectdatabase.php';
if (isset($_POST['submit'])) {
    if (isset($_POST['select'])) {
        $select = array();
        foreach ($_POST['select'] as $values) {
            $sql = "UPDATE account SET account_status='inactive' WHERE username = '$values'";
            if (!(mysqli_query($con, $sql))) {
                die('Error: ' . mysqli_error($con));
            }
        } header("location: remove_user.php");
    } else {
        echo "<script> alert('Nothing selected!'); </script>";
        echo "<script> location.replace('remove_user.php') </script>";
    }
} else {
    header("location: remove_user.php");
    die();
}

mysqli_close($con);
?>