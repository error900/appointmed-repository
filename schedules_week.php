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
            $('#specs').on('click', function() {
                $('#specialization').show();
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

    $start = date("Y-m-d", strtotime('monday this week'));
    $end = date("Y-m-d", strtotime('sunday this week'));
    $date = date("Y-m-d");
    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'");
    $row = mysqli_fetch_array($result);
    $doctor = $row['doctor_name'];
    $specialization = $row['specialization'];
    $email = $row['email'];
    $doctor_id = $row['doctor_id'];
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
    $c_row = mysqli_fetch_array($c_result);
    $a_result = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') AND (appoint_date >= '$start' AND appoint_date <= '$end') ORDER BY 2 ASC, 8 ASC");
    $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'");

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="active dropdown tooltip-right" data-tooltip="Schedules">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-right" data-tooltip="Notifications">
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
                <li class="dropdown tooltip-right" data-tooltip="History">
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
                    <div class="row">
                        <div class="col-xs-12 hidden-lg hidden-md text-right">
                            <form action="export.php" method="post">
                                <input type="hidden" name="doctor_id" value="<?php echo $doctor_id ?>">
                                <input type="submit" class="btn btn-default btn-noborder green-btn" value="Export" name="submit">
                            </form>
                        </div>
                        <div class="col-md-12 col-md-4 col-md-offset-2 user-md">
                            <h1><?php echo $doctor; ?></h1>
                            <p><?php echo $row['specialization']; ?></p>
                            <p><?php echo $c_row['clinic_location']; ?></p>
                            <p class="email"><?php echo $row['email']; ?></p>
                            <p><?php echo $c_row['clinic_contact']; ?></p>
                        </div>
                        <?php
                        include 'include/inqueue_served.php';
                        ?>
                    </div>
                </div>
                <div class="container-fluid" id="schedules-md">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-center row-header">&mdash; This Week &mdash;</h2>
                        </div>
                        <?php
                        include 'include/schedules-panel.php';
                        ?>
                    </div>
                </div>
                <?php
                include 'include/refer-modal.php';
                include 'include/remarks-modal.php';
                include 'include/edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>