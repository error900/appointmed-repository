<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Appointments";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
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
                $date_today = date('Y-m-d');

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
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date_today')");

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'");
            $count_row = mysqli_fetch_array($count_result);
            $notif_count = $count_row['count'];
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Today</a></li>
                        <li><a href="appointment_tom.php">Tomorrow</a></li>
                        <li><a href="appointment_week.php">This Week</a></li>
                        <li><a href="appointment_month.php">This Month</a></li>
                    </ul>
                </li>
                <li><a href="notifications.php">Notifications <span class="badge"><?php echo $notif_count ?></span></a></li>
                <li><a href="history.php">History</a></li>
                <li class="nav-button navbar-right">
                    <button type="button" class="btn btn-default btn-noborder edit-profile-btn" data-toggle="modal" data-target=".bs-pt-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                    <i class="fa fa-pencil"></i>Edit Profile</button>
                </li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <!-- /navigation -->           
                <div class="container-fluid" id="appointments-user">
                    <div class="row">
                        <?php if (mysqli_num_rows($p_result) >= 1) { 
                        echo '<div class="col-md-12">
                            <h1 class="text-center row-header-fff">&mdash; Today &mdash;</h1>
                        </div>';
                  
                        while ($d_row = mysqli_fetch_array($p_result)) {
                            $app_id = $d_row['appointment_id'];
                            $doctor = $d_row['doctor_id'];
                            $date = $d_row['appoint_date'];

                            $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'");
                            $doc = mysqli_fetch_array($d_result);
                            echo '<div class="col-xs-12 col-md-6 col-lg-3" id="' . $d_row['appointment_id'] . '">';
                            echo "<div class='panel panel-default' id='asd'><div class='panel-heading appointment-date' >";
                            echo $date;
                            echo "<a href=\"close.php?id=$d_row[appointment_id]&doc=$doctor&pat=$patient_id\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
                            <div class=\"panel-body\">";
                            echo '<p class="appointment-dr-name">Dr. ' . $doc['doctor_name'] . '</p>';
                            echo "</div><div class='appmnt-pnl-btn'>
                            <a class='btn btn-block btn-inverse appo tooltip' data-toggle='modal' data-target='.bs-example-modal-sm' data-id='" . $app_id . "' data-doctor-id='" . $doctor . "' title='edit this appointment'><span><i class='fa fa-pencil'></i></span> Edit</a>";
                            echo '<p class="appointment-specs">' . $doc['specialization'] . '</p></div></div>';
                            echo '</div>';
                        }
                        }else{
                            echo '<div class="col-md-12">
                            <h1 class="text-center row-header-fff">&mdash; Today &mdash;</h1>
                        </div>';
                            echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="alert alert-warning" role="alert">
                                <strong>There are no appointments!</strong> Better check yourself, youre not looking too good.</div>
                                </div>';
                            echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            To know more about creating appointments please read the following
                            <strong> <a href="help.php" class="alert-link">instructions</a></strong>.
                            </div>
                            </div>';
                        }
                        ?>
                    </div>
                </div>

                <?php
                include 'include/edit-modal.php';
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>  

                <script type="text/javascript" src="js/search.js"></script>
        </div> <!-- /container -->
    </body>
</html>