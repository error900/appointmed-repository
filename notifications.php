<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Notifications";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
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

            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
            $row = mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id'");
            $p_row = mysqli_fetch_array($p_result);
            $date_today = date('Y-m-d');            
            //announcement
            $announcement = mysqli_query($con,"SELECT * FROM announcement ORDER BY 4 asc");
            //$doctor = $p_row['doctor_id'];
            //$date = $p_row['appoint_date'];
            //$d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'" );
            //$doc =  mysqli_fetch_array($d_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id' ORDER BY 6 DESC");

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND (indicator = 'doctor' OR indicator = 'admin')");
            $count_row = mysqli_fetch_array($count_result);
            $count_announcement = mysqli_query($con, "SELECT * FROM announcement WHERE start_publish <= '$date_today' AND end_publish >= '$date_today' AND (send_to = 'all' OR send_to = 'patient')");
            $notif_count = $count_row['count'];
            $announcement_count = mysqli_num_rows($count_announcement);
            $notif_count2 = $notif_count + $announcement_count;

            ?>
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
                <li class="active tooltip-right" data-tooltip="Notifications">
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
                <div class="container-fluid" id="notification">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center row-header-fff">&mdash; Your Notifications &mdash;</h1>
                        </div>
                        <div class="col-md-12">
                            <!-- <h2 class="text-left date-header">Today</h2> -->
                        </div>
                        <?php
                        if($notif_count2 >=1){
                            while ($a_result = mysqli_fetch_array($announcement)){
                                if(($date_today >= $a_result['start_publish']) && ($date_today <= $a_result['end_publish'])){
                                    if($a_result['send_to'] == 'patient' || $a_result['send_to'] == 'all'){
                                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                            <div class="panel panel-notif panel-danger">
                                                <div class="panel-heading">'.date("F j, Y", strtotime($a_result['start_publish'])).' '.$a_result['subject'].'
                                               </div>
                                                <div class="panel-body">
                                                    '.$a_result['announcement_details'].'
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                            }

                            while ($n_row = mysqli_fetch_array($n_result)) {
                                if ($n_row['indicator'] == 'doctor' || $n_row['indicator'] == 'admin') {
                                    if ($n_row['patient_id'] == $patient_id) {
                                        $n_id = $n_row['legend_id'];
                                        $n_did = $n_row['doctor_id'];
                                        $notif_date = date("F j , Y", strtotime($n_row["notification_date"]));

                                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                                        $n_color = mysqli_fetch_array($n_legend);

                                        $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'");
                                        $doc = mysqli_fetch_array($d_result);

                                        //$n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_did'" );
                                        //$n_name =  mysqli_fetch_array($n_patient);

                                        if ($n_color['color'] == 'red' && $n_row['indicator'] == 'doctor') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-danger'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $notif_date . "
                                        <a href=\"close_notif.php?nid=$n_row[notification_id]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        ". $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                        } else if ($n_color['color'] == 'orange') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-warning'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $notif_date  . "
                                        <a href=\"close_notif.php?nid=$n_row[notification_id]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                        } else if ($n_color['color'] == 'green') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-success'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $notif_date  . "
                                        <a href=\"close_notif.php?nid=$n_row[notification_id]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                        } else if ($n_color['color'] == 'blue') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-info'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $notif_date  . "
                                        <a href=\"close_notif.php?nid=$n_row[notification_id]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                        }else if ($n_color['color'] == 'red' && $n_row['indicator'] == 'admin') {
                                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-danger'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>Admin</span>" . $notif_date . "
                                        <a href=\"close_notif.php?nid=$n_row[notification_id]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        ". $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                        }
                                    }
                                }
                            }
                        }else{
                            echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
                            <div class="alert alert-warning" role="alert">
                            <strong>You have no notifications.</strong></div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                include 'include/edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
        </div> <!-- /container -->
    </body>
</html>
