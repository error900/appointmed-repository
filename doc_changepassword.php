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
                $("#appoint_id").val($(this).data('a-id'));
                $("#patient_id").val($(this).data('p-id'));
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
    else if ($account_type != 'Doctor')
        header("location: admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $doctor = $row['doctor_name'];
    $specialization = $row['specialization'];
    $email = $row['email'];
    $doctor_id = $row['doctor_id'];
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $c_row = mysqli_fetch_array($c_result);
    $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date') ORDER BY appointment_id") or die(mysqli_error());
    $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'") or die(mysqli_error());

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'") or die(mysqli_error());
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li>
                    <a href="doc_notifications.php">
                        <i class="fa fa-bell fa-lg">
                            <?php
                            if ($notif_count == 0)
                                echo '<span class="badge hide">' . $notif_count . '</span>';
                            else
                                echo '<span class="badge">' . $notif_count . '</span>';
                            ?>
                        </i>Notifications
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="completed.php">Done Schedules</a></li>
                        <li><a href="removed.php">Removed Schedules</a></li>
                        <li><a href="referred.php">Referred Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/dc-nav-end.php';
                ?>
                <form method="post" action="change_doc_pass.php" name=form1>
                <div>
                    <input type="password"  class="form-control" name="old_password" placeholder="Enter old password"/>
                        
                                    <input type="hidden" name="username" value="<?php echo $username?>"/>
                                    <input type="password" class="form-control" name="password" placeholder="Password"  
                                           required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                           onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                        if (this.checkValidity())
                                            form1.password2.pattern = this.value;" required=""/>  
                                    <p class="passwordReq">Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>

                                    <input type="password" title="Passwords do not match" class="form-control" name="password2" placeholder="Confirm Password" 
                                           onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                           />
                    <input type="submit" value="Submit" name="submit"/>
                </div>
            </form>
            </div>
                <?php
                include 'include/refer-modal.php';
                include 'include/edit-profile-modal.php';
                include 'include/remarks-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>