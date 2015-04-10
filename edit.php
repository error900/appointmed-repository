<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Edit Appointment";
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

            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'");
            $row = mysqli_fetch_array($result);
            $patient = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient' AND appointment_status = 'Inqueue' ");
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
                        <li><a href="#">Tomorrow</a></li>
                        <li><a href="#">This Week</a></li>
                        <li><a href="#">This Month</a></li>
                    </ul>
                </li>
                <li><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
                <li><a href="history.php">History</a></li>
                <?php
                include 'include/pt-nav-end.php';
                ?>     
                <!-- /navigation -->           
                <div class="container-fluid" id="appointments-user">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center text-turquoise appmnt-h">&mdash; Edit &mdash;</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="this-appointment">
                                <h2 class="current-date"><span>Today:</span>dd/mm/yyyy</h2>
                                <form class="form-input"  method="post" action="editappointment.php">
                                    <label for="inputDate">Choose a new date: </label>
                                    <?php $app_id = mysqli_real_escape_string($con, $_GET['appid']); ?>
                                    <input type="date" name="appdate" value="<?php echo date('m/d/Y'); ?>" required/>
                                    <input type="hidden" name="appointment_id" value="<?php echo $app_id; ?>">
                                    <input class="btn btn-default login-btn btn-noborder" type="submit" name="submit"/>";
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-2">
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div> <!-- /container -->
    </body>
</html>