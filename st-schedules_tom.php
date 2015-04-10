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

    $tomorrow = date("Y-m-d", time() + 86400);
    $username = $_SESSION['username'];
    $date = date("Y-m-d");
    $result = mysqli_query($con, "SELECT * FROM secretary WHERE username LIKE '$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $secretary = $row['secretary_name'];
    $secretary_id = $row['secretary_id'];

    $email = $row['email'];
    $doctor_id = $row['doctor_id'];

    $doctor = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $doctor_row = mysqli_fetch_array($doctor);
    
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
    $c_row = mysqli_fetch_array($c_result);
    $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$tomorrow') ORDER BY appointment_id");
//    $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'");

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/st-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"><span class="caret"></span></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li><a href="doc_notifications.php"><i class="fa fa-bell fa-lg"><span class="badge"><?php echo $notif_count?></span></i>Notifications </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"><span class="caret"></span></i>History</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="completed.php">Done Schedules</a></li>
                        <li><a href="removed.php">Removed Schedules</a></li>
                        <li><a href="referred.php">Referred Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/st-nav-end.php';
                ?>
                <div class="container-fluid" id="user-md-frw">
                    <div class="row">
                        <div class="col-md-12 col-md-4 col-md-offset-2 user-md">
                            <h1><?php echo $doctor_row['doctor_name']; ?></h1>
                            <p><?php echo $c_row['clinic_location']; ?></p>
                            <p class="email"><?php echo $doctor_row['email']; ?></p>
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
                            <h2 class="text-center row-header">&mdash; Tomorrow&mdash;</h2>
                        </div>
                        <?php
                        include 'include/st-schedules-panel.php';
                        ?>
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