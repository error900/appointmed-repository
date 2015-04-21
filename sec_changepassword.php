<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Schedules";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() { // Click to only happen on announce links
                $("#appo_id").val($(this).data('id'));
                $("#pat_id").val($(this).data('patient-id'));
                $("#app_id").val($(this).data('a-id'));
                $("#pats_id").val($(this).data('p-id'));
            });
            $('#hideshow').on('click', function() {
                $('#clinics').show();
            });
            $('#showsec').on('click', function() {
                $('#secretary').show();
            });
        });
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: admin/index.php");
    else if ($account_type != 'Secretary')
        header("location: admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM secretary WHERE username LIKE '$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $secretary = $row['secretary_name'];
    $secretary_id = $row['secretary_id'];
    $email = $row['email'];

    $doctor_id = $row['doctor_id'];
    $doctor = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $doctor_row = mysqli_fetch_array($doctor);

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'") or die(mysqli_error());
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="secretary-bg">
        <div class="container">        
            <?php
            include 'include/st-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-schedules.php">Today</a></li>
                        <li><a href="st-schedules_tom.php">Tomorrow</a></li>
                        <li><a href="st-schedules_week.php">This Week</a></li>
                        <li><a href="st-schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-completed.php">Finished Schedules</a></li>
                        <li><a href="st-removed.php">Removed Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/st-nav-end.php';
                ?>
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <h1 class="text-center row-header-lc">Change Password</h1>
                    <div class="signup-form">
                        <form method="post" action="change_sec_pass.php" name="form1">
                            <div class="input-group">
                                <input type="password"  class="form-control" required="" name="old_password" placeholder="Old password"/>

                                <input type="hidden" name="username" value="<?php echo $username?>"/>
                                <input type="password" class="form-control" name="password" placeholder="New Password"  
                                required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if (this.checkValidity())
                                form1.password2.pattern = this.value;" required=""/>  
                                <p class="passwordReq">Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>

                                <input type="password" title="Passwords do not match" class="form-control" name="password2" placeholder="Confirm New Password" 
                                onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                />
                                <input type="submit" class="btn btn-default orange-btn" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                include 'include/remarks-modal.php';
                include 'include/st-edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>