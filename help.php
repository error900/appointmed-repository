<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Help";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
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
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id' LIMIT 10") or die(mysqli_error());
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
                        <li><a href="appointment_next.php">Next Month</a></li>
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
                <div class="container-fluid" id="help">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="row-header text-center">Help</h1>
                        </div>
                        <div class="col-xs-12 col-md-4 help-text">
                            <h4>Find your Doctor</h4>
                            <p>Type name of doctor or specialization in search bar above.</p>
                            <p>Choose and click on the name of your doctor in the result/s shown below the search bar and it will lead you to your doctor's Profile.</p>
                            <h4>Follow your Doctor</h4>
                            <p>To get notifications about your doctor you must follow him Click on the follow button on your doctor's profile. Unfollow your doctor by clicking the same button.</p>
                        </div>
                        <div class="col-xs-12 col-md-4 help-text">
                            <h4>Set an Appointment</h4>
                            <p>To create an appointment with your doctor go to his profile, choose  a clinic of his, and hit the create appointment button.</p>
                            <p>After that, choose a date and time and hit the appoint.me button.</p>
                            <h4>Edit an Appointment</h4>
                            <p>View your appointments by clicking on the appointments link. Select the appointment you want to update and from there you can change the date and time of your appointment or you could just delete that appointment if you no longer wish to have it.</p>
                        </div>
                        <div class="col-xs-12 col-md-4 help-text">
                            <h4>Update your Profile</h4>
                            <p>On your profile on the right corner, you will see a button. By clicking that button, you will now be able to edit your profile by changing the information on the forms.</p>
                            <h4>View your appointments</h4>
                            <p>Click on the appointments link on top of the page.</p>
                            <h4>View your notifications</h4>
                            <p>Click on the notifications link on top of the page.</p>
                        </div>
                    </div>
                </div>
                <?php
                include 'include/scrolltop.php';
                include 'include/edit-profile-modal.php';
                ?>  
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>