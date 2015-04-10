<?php
include 'connectdatabase.php';
if (isset($_POST['submit'])) {
    $secretary_id = $_POST['secretary_id'];
    $target_dir = "img/profile/";
    $uploadOk = 1;
    $target_file = $target_dir . basename($_FILES['profile_pic']['name']);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if (isset($_POST["submit"])) {
        if (!($_FILES["profile_pic"]["tmp_name"])) {
            echo '<script>alert("Error! No file selected");</script>';
            echo "<script> location.replace('secretary-profile.php') </script>";
        } else
            $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);

        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($imageFileType != "jpg") {
        echo "<script> alert('Sorry, only .jpg files are allowed'); </script>";
        echo "<script> location.replace('secretary-profile.php') </script>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["profile_pic"]["name"]) . " has been uploaded.";
            rename($target_file, "img/profile/" . $secretary_id . ".jpg");
            header("location: secretary-profile.php");
        } else {
            echo "<script> alert('Sorry, there was an error uploading your file.'); </script>";
            echo "<script> location.replace('secretary-profile.php') </script>";
        }
    }
} else {
    echo "<script> alert('Error!); </script>";
    echo "<script> location.replace('secretary-profile.php') </script>";
    die();
}
?>