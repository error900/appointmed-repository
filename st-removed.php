<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Removed";
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
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $c_row = mysqli_fetch_array($c_result);
    $clinic_id = $c_row['clinic_id'];
    $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appointment_status = 'Cancelled' ORDER BY appointment_id") or die(mysqli_error());

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
                        <li><a href="st-schedules_next.php">Next Month</a></li>
                    </ul>
                </li>
                <li class="dropdown active" >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-completed.php">Finished Appointments</a></li>
                        <li><a href="st-removed.php">Cancelled Appointments</a></li>
                    </ul>
                </li>
                <?php
                include 'include/st-nav-end.php';
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
                            echo '<p> Queue Number: ' . $row['appointment_id'] . '</p>';
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
                </div>
                <?php
                include 'include/remarks-modal.php';
                include 'include/st-edit-profile-modal.php';
                include 'include/add_to_queue.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>