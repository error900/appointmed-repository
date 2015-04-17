<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Patient Profile";
    include 'include/head.php';
    include 'connectdatabase.php';
    ?>
    <body>
        <div class="container">
            <?php
            session_start();
            $loggedIn = $_SESSION['loggedIn'];
            $account_type = $_SESSION['account_type'];
            if ($loggedIn == false)
                header("location: index.php");
            else if ($account_type != 'Patient')
                header("location: index.php");

            //patient
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'") or die(mysqli_error());
            $row = mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id'") or die(mysqli_error());
            $p_row = mysqli_fetch_array($p_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id' ORDER BY 6 DESC, 1 DESC LIMIT 10");

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
                <!-- /navigation -->
                <div class="container-fluid" id="patient-info">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-md-offset-2">
                            <img src="img/profile/<?php
                            $file = "img/profile/" . $patient_id . ".jpg";
                            if (file_exists($file)) {
                                echo $patient_id;
                            } else {
                                echo 'profile_patient';
                            }
                            ?>.jpg" class="img-responsive">
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <div class="p-info">
                                <ul>
                                    <li><i class="fa fa-user"></i><?php echo $row['patient_name']; ?></li>
                                    <?php
                                    $birthday = explode("-", $row['birthdate']);
                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))) > date("md") ? ((date("Y") - $birthday[0]) - 1) : (date("Y") - $birthday[0]));
                                    ?>
                                    <li><i class="fa fa-birthday-cake"></i><?php echo $row['birthdate']; ?> &mdash; <?php echo $age; ?> years old</li>
                                    <li><i class="fa fa-briefcase"></i><?php echo $row['occupation']; ?></li>
                                    <li><i class="fa fa-phone"></i><?php echo $row['patient_contact']; ?></li>
                                    <li class="email"><i class="fa fa-envelope"></i><?php echo $row['email']; ?></li>
                                </ul>
                            </div>
                        </div>   
                    </div>
                </div>
                <div class="container-fluid patient-activity">
                    <div class="row">
                        <?php
                        if (mysqli_num_rows($n_result) >= 1) {
                            echo '<div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center row-header2-fff">Recent Activity</h1>
                    </div>';
                            while ($n_row = mysqli_fetch_array($n_result)) {
                                if ($n_row['indicator'] == 'patient') {
                                    if ($n_row['patient_id'] == $patient_id) {
                                        $n_id = $n_row['legend_id'];
                                        $n_did = $n_row['doctor_id'];
                                        $notif_date = date("F j , Y", strtotime($n_row["notification_date"]));

                                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                                        $n_color = mysqli_fetch_array($n_legend);

                                        $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'");
                                        $doc = mysqli_fetch_array($d_result);

                                        if ($n_color['color'] == 'orange') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-warning'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $doc["doctor_name"] . "</span>" . $notif_date . "
                                    <a href=\"close_notif_prof.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                     You have rescheduled an appointment.<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                        } else if ($n_color['color'] == 'blue') {
                                            if($n_row['notification'] == 'A patient has requested an appointment.')
                                                $notification_m = 'You have created an appointment.';
                                            else
                                                $notification_m = 'You have cancelled an appointment.';
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-info'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $doc["doctor_name"] . "</span>" . $notif_date . "
                                    <a href=\"close_notif_prof.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                    " . $notification_m . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                        }
                                    }
                                }
                            }
                        } else
                            echo '<h1 class="text-center row-header2-fff">No Recent Activity</h1>';
                        ?>
                    </div>
                </div>
                <?php
                include 'include/scripts.php';
                include 'include/edit-profile-modal.php';
                include 'include/scrolltop.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>