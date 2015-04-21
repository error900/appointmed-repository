<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Change Password";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() {
                $("#appo_id").val($(this).data('id'));
                $("#doc_id").val($(this).data('doctor-id'));
            });
        });
    </script>
    <body>
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type']) && isset($_SESSION['username'])) {
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                $username = $_SESSION['username'];
                $date_today = date('Y-m-d');

                if ($loggedIn == false)
                    header("location: index.php");
                else if ($account_type != 'Patient')
                    header("location: index.php");
            }else {
                header("location: index.php");
                die();
            }
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
            $row = mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date_today')");

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'");
            $count_row = mysqli_fetch_array($count_result);
            $notif_count = $count_row['count'];
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown tooltip-right" data-tooltip="Appointments">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Appointments<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointment.php">Today</a></li>
                        <li><a href="appointment_tom.php">Tomorrow</a></li>
                        <li><a href="appointment_week.php">This Week</a></li>
                        <li><a href="appointment_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-right" data-tooltip="Notifications">
                    <a href="notifications.php">
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
                <li class="dropdown tooltip-right" data-tooltip="History">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointments_done.php">Appointments Done</a></li>
                        <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                    </ul>
                </li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <h1 class="text-center row-header-fff">Change Password</h1>
                    <div class="signup-form">
                        <form method="post" action="change_pass.php" name="form1">
                            <div class="input-group">
                                <input type="password" class="form-control" required="" name="old_password" placeholder="Old password"/>

                                <input type="hidden" name="username" value="<?php echo $username?>"/>
                                <input type="password" class="form-control" name="password" placeholder="New Password"  
                                required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if (this.checkValidity())
                                form1.password2.pattern = this.value;" required=""/>  
                                <p class="password-format">Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>

                                <input type="password" class="form-control" title="Passwords do not match" name="password2" placeholder="Confirm New Password" 
                                onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                />
                                <input type="submit" class="btn btn-default orange-btn btn-noborder" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                include 'include/edit-modal.php';
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>  
                <script type="text/javascript" src="js/search.js"></script>
        </div> <!-- /container -->
    </body>
</html>