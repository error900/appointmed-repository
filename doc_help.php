<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Help";
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

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
    $count_row = mysqli_fetch_array($count_result);
    $count_announcement = mysqli_query($con, "SELECT * FROM announcement");
    $notif_count = $count_row['count'];
    $announcement_count = mysqli_num_rows($count_announcement);
    $notif_count2 = $notif_count + $announcement_count;
    $date_today = date('Y-m-d');
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown tooltip-right" data-tooltip="Schedules">
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
                            if ($notif_count2 == 0)
                                echo '<span class="badge hide">' . $notif_count2 . '</span>';
                            else
                                echo '<span class="badge">' . $notif_count2 . '</span>';
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
                
                <?php
                include 'include/refer-modal.php';
                include 'include/edit-profile-modal.php';
                include 'include/remarks-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>