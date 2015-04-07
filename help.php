<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Appointments";
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

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'");
            $count_row = mysqli_fetch_array($count_result);
            $notif_count = $count_row['count'];
            ?>
            <!-- navigation -->
            <?php
            include 'include/pt-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointment.php">Today</a></li>
                        <li><a href="appointment_tom.php">Tomorrow</a></li>
                        <li><a href="appointment_week.php">This Week</a></li>
                        <li><a href="appointment_month.php">This Month</a></li>
                    </ul>
                </li>
                <li><a href="notifications.php">Notifications <span class="badge"><?php echo $notif_count ?></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">History <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="appointments_done.php">Appointments Done</a></li>
                        <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                    </ul>
                </li>
                <li class="nav-button navbar-right">
                    <button type="button" class="btn btn-default btn-noborder edit-profile-btn" data-toggle="modal" data-target=".bs-pt-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                        <i class="fa fa-pencil"></i>Edit Profile</button>
                </li>

                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <div class="container-fluid" id="help">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="row-header text-center">Benguet Laboratories - appoint.med</h1>
                        </div>
                        <div class="col-xs-12 col-md-8 col-md-offset-2">
                            <h2 class="row-header-lc">Help</h2>
                            <h3 class="row-header">Patient Help</h3>
                            <h4>How to find your Doctor</h4>
                            <p>
                                Type name of doctor or specialization in search bar above.
                                </br>
                                Choose and click on the name of your doctor in the result/s shown below the search bar and it will lead you to your doctor's Profile. 
                                </br>
                            </p>

                            <h4>How to follow your Doctor</h4>
                            To get notifications about your doctor you must follow him Click on the follow button on your doctor's profile. Unfollow your doctor by clicking the same button.
                            </br>

                            <h4>How to set an Appointment</h4>
                            To create an appointment with your doctor go to his profile, choose  a clinic of his, and hit the create appointment button. 
                            </br>
                            After that, choose a date and time and hit the appoint.me button. 

                            <h4>How to edit an Appointment</h4>
                            View your appointments by clicking on the appointments link. Select the appointment you want to update and from there you can change the date and time of your appointment or you could just delete that appointment if you no longer wish to have it. 

                            <h4>How to edit or update your Profile</h4>
                            On your profile on the right corner, you will see a button. By clicking that button, you will now be able to edit your profile by changing the information on the forms. 
                            <h4>How to view your appointments</h4>
                            <h4>How to view your notifications</h4>
                            <h4>How to know if your programmers are reviewing your code</h4>
                            <h4>NIALL AND THE POTATOES</h4>
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