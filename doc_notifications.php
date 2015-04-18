<!DOCTYPE html>
<html lang="en">
        <?php
        $title = "Notifications";
        include 'include/head.php';
        include 'connectdatabase.php';
        include 'include/scripts.php';
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".appo").click(function() {
                    $("#appo_id").val($(this).data('id'));
                    $("#pat_id").val($(this).data('patient-id'));
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

        $username = $_SESSION['username'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'");
        $row = mysqli_fetch_array($result);
        $doctor = $row['doctor_name'];
        $specialization = $row['specialization'];
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $c_row = mysqli_fetch_array($c_result);

        //announcement
        $announcement = mysqli_query($con,"SELECT * FROM announcement ORDER BY 4 asc");
        //$a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') ORDER BY appointment_id");
        //$sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'" );
        $n_result = mysqli_query($con, "SELECT * FROM notification WHERE doctor_id LIKE '$doctor_id' ORDER BY 6 DESC");

        $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
        $count_row = mysqli_fetch_array($count_result);
        $notif_count = $count_row['count'];
        $date_today = date('Y-m-d');
        ?>
    <body class="e4e8e9-bg">
        <div class="container">
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="active">
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
                <li class="dropdown">
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
                <div class="container-fluid" id="notification">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center row-header">Your Notifications</h1>
                        </div>
                        <div class="col-md-12">
                         <!--    <h2 class="text-left date-header-000">Today</h2> -->
                        </div>
                        <?php
                        while ($a_result = mysqli_fetch_array($announcement)){
                            if(($date_today >= $a_result['start_publish']) && ($date_today <= $a_result['end_publish'])) {
                                if($a_result['send_to'] == 'doctor' || $a_result['send_to'] == 'all'){
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
                            if ($n_row['indicator'] == 'patient') {
                                if ($n_row['doctor_id'] == $doctor_id) {
                                    $n_id = $n_row['legend_id'];
                                    $n_pid = $n_row['patient_id'];
                                    $notif_date = date("F j , Y", strtotime($n_row["notification_date"]));

                                    $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                                    $n_color = mysqli_fetch_array($n_legend);

                                    $n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_pid'");
                                    $n_name = mysqli_fetch_array($n_patient);

                                    if ($n_color['color'] == 'red') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-danger'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $n_name['patient_name'] . '</span>' . $notif_date . "
                                        <a href=\"close_notif_doc.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . '<span class="visible-xs visible-sm notif-name">&mdash; ' . $n_name['patient_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                    } else if ($n_color['color'] == 'orange') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-warning'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $n_name['patient_name'] . '</span>' . $notif_date . "
                                        <a href=\"close_notif_doc.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . '<span class="visible-xs visible-sm notif-name">&mdash; ' . $n_name['patient_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                    } else if ($n_color['color'] == 'green') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-success'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $n_name['patient_name'] . '</span>' . $notif_date . "
                                        <a href=\"close_notif_doc.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . '<span class="visible-xs visible-sm notif-name">&mdash; ' . $n_name['patient_name'] . "</span>
                                    </div>
                                </div>
                            </div>";
                                    } else if ($n_color['color'] == 'blue') {
                                        echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-info'>
                                    <div class='panel-heading'><span class='hidden-xs hidden-sm'>" . $n_name['patient_name'] . '</span>' . $notif_date . "
                                        <a href=\"close_notif_doc.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . '<span class="visible-xs visible-sm notif-name">&mdash; ' . $n_name['patient_name'] . "</span>
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
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div> <!-- /container -->
    </body>
</html>
