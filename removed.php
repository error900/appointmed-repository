<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $title = "Removed";
        include 'include/head.php';
        include 'connectdatabase.php';
        include 'include/scripts.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
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

        $username = $_SESSION['username'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'") or die(mysqli_error());
        $row = mysqli_fetch_array($result);
        $doctor = $row['doctor_name'];
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $specialization = $row['specialization'];

        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif WHERE doctor_id LIKE '$doctor_id' AND appointment_status = 'Cancelled' ORDER BY appointment_id") or die(mysqli_error());
        $date_today = date('Y-m-d');
        $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
        $count_row = mysqli_fetch_array($count_result);
        $count_announcement = mysqli_query($con, "SELECT * FROM announcement WHERE start_publish <= '$date_today' AND end_publish >= '$date_today' AND (send_to = 'all' OR send_to = 'doctor')");
        $notif_count = $count_row['count'];
        $announcement_count = mysqli_num_rows($count_announcement);
        $notif_count2 = $notif_count + $announcement_count;

        ?>
    <body class="e4e8e9-bg">
        <div class="container">
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown tooltip-bottom" data-tooltip="Schedules">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                        <li><a href="schedules_next.php">Next Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-bottom" data-tooltip="Notifications">
                    <a href="doc_notifications.php">
                        <i class="fa fa-bell fa-lg">
                            <?php
                            if ($notif_count2 == 0)
                                echo '<span class="badge hide">' . $notif_count2 . '</span>';
                            else
                                echo '<span class="badge">' . $notif_count2 . '</span>';
                            ?>
                        </i>Notifications
                    </a>
                </li>
                <li class="dropdown active tooltip-bottom" data-tooltip="History">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="completed.php">Finished Schedules</a></li>
                        <li><a href="removed.php">Removed Schedules</a></li>
                        <li><a href="referred.php">Referred Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/dc-nav-end.php';
                ?>
                <div class="container-fluid" id="user-md-frw">
                    <div class="col-xs-12 col-md-12">
                        <h2 class="text-center row-header">&mdash; Cancelled &mdash;</h2>
                    </div>
                     <?php
                    if(mysqli_num_rows($a_result)>=1){
                        while ($row = mysqli_fetch_array($a_result)) {
                            $patient = $row['patient_id'];
                            $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
                            $pat = mysqli_fetch_array($p_result);
                            echo '<div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="panel panel-default sched-panel">';
                            echo'<div class="panel-heading">';
                            echo $pat['patient_name'];
                            echo '</div>';
                            echo' <div class="panel-body">';
                            echo '<p>' . $pat['patient_contact'] . '</p>';
                            echo '<p>' . $c_row['clinic_location'] . '</p>';
                            echo '<p> Queue Number: ' . $row['queue_id'] . '</p>';
                            echo '</div>
                     </div>
                   </div>';
                        }
                    }else{
                        echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
                        <div class="alert alert-warning" role="alert">
                        <strong>There are currently no cancelled schedules.</strong></div>
                        </div>';
                    }
                    ?>
                </div><!-- /.container-fluid -->
                <?php
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>
        </div> <!-- container -->
    </body>
</html>