<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin Login";
    include 'include/head.php';
    ?>
    <?php
    session_start();
    if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])) {
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];

        if ($loggedIn == true && $account_type == 'Doctor')
            header("location: ../schedules.php");
        else if ($loggedIn == true && $account_type == 'Admin')
            header("location: dashboard.php");
        else if ($loggedIn == true && $account_type == 'FrontDesk')
            header("location: ../frontdesk/index.php");
        else if ($loggedIn == true && $account_type == 'Secretary')
            header("location: ../st-schedules.php");
    }
    ?>
    <body class="e4e8e9-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <h1 class="text-center row-header">Login</h1>
                    <div class="usr-login">
                        <div class="input-group">
                            <form method="post" action ="login.php">
                                <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                                <i class="fa fa-user field-icon"></i>
                        </div>

                        <div class="input-group">
                            <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                            <i class="fa fa-lock field-icon"></i>
                        </div>
                        <input type="submit" name="login" class="btn btn-default orange-btn" value="LogIn">
                        <a class="login-link" href="../index.php">Return to HOMEPAGE</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
include 'include/scripts.php';
?>
    </body>
</html>