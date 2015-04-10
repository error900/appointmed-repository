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
            //$doctor = $p_row['doctor_id'];
            //$date = $p_row['appoint_date'];
            //$d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'" );
            //$doc =  mysqli_fetch_array($d_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id' ORDER BY 6 DESC");

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'");
            $count_row = mysqli_fetch_array($count_result);
            $notif_count = $count_row['count'];
            ?>
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
                <li class="active">
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
                <li class="dropdown">
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
                            <!--                    <h2 class="text-left date-header">Today</h2>-->
                        </div>
                        <?php
                        while ($n_row = mysqli_fetch_array($n_result)) {
                            if ($n_row['indicator'] == 'doctor') {
                                if ($n_row['patient_id'] == $patient_id) {
                                    $n_id = $n_row['legend_id'];
                                    $n_did = $n_row['doctor_id'];

                                    $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                                    $n_color = mysqli_fetch_array($n_legend);

                                    $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'");
                                    $doc = mysqli_fetch_array($d_result);

                                    //$n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_did'" );
                                    //$n_name =  mysqli_fetch_array($n_patient);

                                    if ($n_color['color'] == 'red') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-danger'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $n_row["notification_date"] . "
                                    <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                    " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                    } else if ($n_color['color'] == 'orange') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-warning'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $n_row["notification_date"] . "
                                    <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                    " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                    } else if ($n_color['color'] == 'green') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-success'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $n_row["notification_date"] . "
                                    <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                    " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                    } else if ($n_color['color'] == 'blue') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                            <div class='panel panel-notif panel-info'>
                                <div class='panel-heading'><span class='hidden-xs hidden-sm'>Dr. " . $doc["doctor_name"] . "</span>" . $n_row["notification_date"] . "
                                    <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                </div>
                                <div class='panel-body'>
                                    " . $n_row['notification'] . "<span class='visible-xs visible-sm notif-name'>&mdash; Dr. " . $doc['doctor_name'] . "</span>
                                </div>
                            </div>
                        </div>";
                                    }
                                }
                            }
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
