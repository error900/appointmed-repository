<html>
    <body>
        <?php
        SESSION_start();
        include '../connectdatabase.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $account_type = '';
        $date = date('Y-m-d');

        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $password = hash('sha256', $password);

        $result = mysqli_query($con, "SELECT * FROM account WHERE BINARY username = '$username' AND BINARY password = '$password' ");
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if (!($count == 1)) {
            if ($username == "" && $password == "") {
                echo "<script> alert('Enter a username and password');</script>";
                echo "<script> location.replace('index.php') </script>";
            }
            echo "<script> alert('Incorrect Username/Password'); </script>";
            echo "<script> location.replace('index.php') </script>";
            $_SESSION['can_access'] = true;
            $_SESSION['loggedIn'] = false;
        } else {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['account_type'] = $row['account_type'];
            if ($row['account_type'] == 'Admin') {
                header("location: dashboard.php");
            } else if ($row['account_type'] == 'Patient') {
                header("location: index.php");
            } else if ($row['account_type'] == 'Doctor'){
                $sql = "UPDATE account SET last_logged_in = '$date' WHERE username LIKE '$username'";
                if (!(mysqli_query($con, $sql))) {
                    die('Error: ' . mysqli_error($con));
                }
                header("location: ../schedules.php");
            } else if($row['account_type'] == 'Secretary'){
                $sql = "UPDATE account SET last_logged_in = '$date' WHERE username LIKE '$username'";
                if (!(mysqli_query($con, $sql))) {
                    die('Error: ' . mysqli_error($con));
                }
                header("location: ../st-schedules.php");
            } else{
                header("location: ../frontdesk/index.php");
            }
        }
        mysqli_close($con);
        ?>

    </body>
</html>