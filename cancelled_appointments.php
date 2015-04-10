<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Appointments";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    //include 'include/scrolltop.php';
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


            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'");
            $count_row = mysqli_fetch_array($count_result);
            $notif_count = $count_row['count'];
            //          $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date_today')" );
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Appointments<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="appointment_month.php">This Month</a></li>
                            </ul>
                        </li>
                        <li>
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
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointments_done.php">Appointments Done</a></li>
                                <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                            </ul>
                        </li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     

                <div class="container-fluid" id="appointments-user">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center row-header-fff">&mdash; Cancelled Appointments &mdash;</h1>
                        </div>
                        <?php
                        $c_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id' AND appointment_status = 'Cancelled' ORDER BY 5 DESC LIMIT 8") or die(mysqli_error());

                        while ($d_row = mysqli_fetch_array($c_result)) {
                            $app_id = $d_row['appointment_id'];
                            $doctor = $d_row['doctor_id'];
                            $date = $d_row['appoint_date'];

                            $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'");
                            $doc = mysqli_fetch_array($d_result);
                            echo '<div class="col-xs-12 col-md-6 col-lg-3" id="' . $d_row['appointment_id'] . '">';
                            echo '<div class="panel panel-default" id="asd">
                            <div class="panel-heading appointment-date">';
                            echo $date;
                            echo '<p class="appointment-dr-name">Dr. ' . $doc['doctor_name'] . '</p>';
                            echo '<p class="appointment-specs">' . $doc['specialization'] . '</p>
                            </div>
                            </div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>

                <?php
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>  

                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div> <!-- /container -->
    </body>
</html>