<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Doctor Profile";
    include 'include/head.php';
    include 'connectdatabase.php';
//        include 'include/datepicker.php';
    include 'include/scrolltop.php';
    include 'include/scripts.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".clinic").click(function() {
                $("#clinic_id").val($(this).data('id'));
            });
        });
         $(function () {
            $('#datetimepicker1').datetimepicker({
                pickTime: false
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
            $doctor_id = mysqli_real_escape_string($con, $_GET['id']);
            //patient
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
            $row = mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];

            //clinic
            $c_result = mysqli_query($con, "SELECT * FROM clinic NATURAL JOIN clinic_schedule WHERE doctor_id LIKE '$doctor_id'");

            //appointment
            $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND appointment_status = 'inqueue' ORDER BY appointment_id");

            //doctor
            $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'");
            $d_row = mysqli_fetch_array($result);
            $doctor = $d_row['doctor_name'];
            $email = $d_row['email'];
            $specialization = $d_row['specialization'];

            $date_today = date('Y-m-d');
            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND (indicator = 'doctor' OR indicator = 'admin')");
            $count_row = mysqli_fetch_array($count_result);
            $count_announcement = mysqli_query($con, "SELECT * FROM announcement WHERE start_publish <= '$date_today' AND end_publish >= '$date_today' AND (send_to = 'all' OR send_to = 'patient')");
            $notif_count = $count_row['count'];
            $announcement_count = mysqli_num_rows($count_announcement);
            $notif_count2 = $notif_count + $announcement_count;
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown tooltip-bottom" data-tooltip="Appointments">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Appointments<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointment.php">Today</a></li>
                        <li><a href="appointment_tom.php">Tomorrow</a></li>
                        <li><a href="appointment_week.php">This Week</a></li>
                        <li><a href="appointment_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-bottom" data-tooltip="Notifications">
                    <a href="notifications.php">
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
                <li class="dropdown tooltip-bottom" data-tooltip="History">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointments_done.php">Appointments Done</a></li>
                        <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                    </ul>
                </li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <!-- /navigation -->
                <div class="container-fluid" id="doctor-info">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-md-offset-2 doctor-photo">
                            <img class="img-responsive" src="img/profile/<?php
                                $file = "img/profile/" . $doctor_id . ".jpg";
                                if (file_exists($file)) {
                                    echo $doctor_id;
                                } else {
                                    echo 'profile';
                                }
                                ?>.jpg">
                        </div>
                        <div class="col-xs-12 col-md-5 user-md">
                            <div class="result d-info">
                                <h1>Dr. <?php echo ($d_row['doctor_name']); ?></h1>
                                <p><?php echo $d_row['specialization']; ?></p>
                                <p class="email"><?php echo $d_row['email']; ?></p>
                                <br/>
                                <p>Benguet Laboratories Incorporated</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3 text-center">
                            <div class="d-info">
                                <ul>
                                    <li class="doc-status">The Doctor is: <span><?php echo($d_row['doctor_status']); ?></span></li>
                                </ul>
                            <?php
                            $sql = mysqli_query($con, "SELECT * FROM subscribe WHERE patient_id LIKE '$patient_id' AND doctor_id LIKE '$doctor_id'") or die(mysqli_error());

                            if (mysqli_num_rows($sql) == 0) {
                                echo '<form action="subscribe.php" method="post" class="subs">';
                                echo '<input type="hidden" name="doctor" value="' . $d_row["doctor_id"] . '">
                        <input type="hidden" name="patient" value="' . $row["patient_id"] . '">';
                                echo '<input type="submit" class="btn btn-default red-btn btn-noborder subscribeUnsubscribe" name="subs" value="Follow">';
                                echo '</form> ';
                            } else {
                                echo '<form action="unsubscribe.php" method="post" class="subs">';
                                echo '<input type="hidden" name="doctor" value="' . $d_row["doctor_id"] . '">
                        <input type="hidden" name="patient" value="' . $row["patient_id"] . '">';
                                echo '<input type="submit" class="btn btn-default red-btn btn-noborder subscribeUnsubscribe" name="unsubs" value="Unfollow">';
                                echo '</form> ';
                            }
                            ?>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="container-fluid" id="clinics">
                    <div class="row">
                        <?php
                        $count = 0;
                        while ($c_row = mysqli_fetch_array($c_result)) {
                            $count++;
                            $days = $c_row['days'];
                            echo '<div class="col-xs-12 col-md-3">';
                            echo '<div class="clinic-box">';
                            echo '<p class="clinic-days">' . $c_row['days'] . '<span>' . $count . '</span></p>';
                            echo '<p class="clinic-name">' . $c_row['clinic_name'] . '</p>';
                            echo '<p class="clinic-times">' . $c_row['time'] . '</p>';
                            echo '<p class="clinic-info">' . $c_row['clinic_location'] . '</p>';
                            echo '<p class="clinic-info">' . $c_row['clinic_contact'] . '</p>';
                            echo ' <button type="button" class="btn btn-default clinic create-btn btn-noborder tooltip-bottom" data-tooltip="create appointment" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="' . $c_row['clinic_id'] . '">
                            <i class="fa fa-edit fa-lg"></i></button>';
                            echo '</div>';
                            echo '</div>';
                            $clinic = $c_row['clinic_id'];
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    include 'include/create-modal.php';
                ?>
        </div>
        <?php
        include 'include/edit-profile-modal.php';
        include 'include/datepicker.php';
        ?>
        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/moment.js"></script>
        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    </body>
</html>