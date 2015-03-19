<!DOCTYPE html>
<html lang="en">
    <style>
        #divResult
        {
            position:absolute;
            width:210px;
            display:none;
            margin-top:40px;
            border:solid 1px #dedede;
            border-top:0px;
            overflow:hidden;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
            -moz-border-bottom-right-radius: 6px;
            -moz-border-bottom-left-radius: 6px;
            border-width: 3px 1px 1px;
            border-color: #333 #DEDEDE #DEDEDE;
            background-color: white;
        }
        .display_box
        {
            padding:4px; border-top:solid 1px #dedede; 
            font-size:12px;

        }
        .display_box:hover
        {
            background:#3bb998;
            color:#FFFFFF;
            cursor:pointer;
        }
        a
        {
            text-decoration: none;

            background: #3bb998;
            color:#FFFFFF;
            cursor: pointer;
        }
    </style>
    <?php
        $title = "Doctor Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
        include 'include/datepicker.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".clinic").click(function() {
                $("#clinic_id").val($(this).data('id'));
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
            $p_row = mysqli_fetch_array($result);
            $patient = $p_row['patient_id'];
            $patient_n = $p_row['patient_name'];

            //clinic
            $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");

            //appointment
            $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND appointment_status = 'inqueue' ORDER BY appointment_id");

            //doctor
            $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'");
            $d_row = mysqli_fetch_array($result);
            $doctor = $d_row['doctor_name'];
            $email = $d_row['email'];
            $specialization = $d_row['specialization'];
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
                <div class="container-fluid" id="doctor-info">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-md-offset-3 d-pic">
                            <img class="img-responsive" src="img/profile/<?php
                            $file = "img/profile/" . $doctor_id . ".jpg";
                            if (file_exists($file)) {
                                echo $doctor_id;
                            } else {
                                echo 'profile';
                            }
                            ?>.jpg">
                        </div>
                        <div class="col-xs-12 col-md-4 col-md-offset-1">
                            <div class="d-info">
                                <ul>
                                    <li><i class="fa fa-user-md"></i>Dr. <?php echo strtoupper($d_row['doctor_name']); ?></li>
                                    <li><i class="fa fa-medkit"></i><?php echo $d_row['specialization']; ?>y</li>
                                    <br>
                                    <li><i class="fa fa-h-square"></i>Benguet Laboratory Incorporated</li>
                                    <li><i class="fa fa-angle-double-right"></i> Plastic Surgery, Cosmetic Surgery</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
                            <div class="d-info">
                                <ul>
                                    <li class="doc-status">The Doctor is: <span><?php echo($d_row['doctor_status']); ?></span></li>
                                    <li class="email"><?php echo $d_row['email']; ?></li>
                                </ul>

                                <form action="subscribe.php" method="post" class="subs">
                                    <input type="hidden" name="doctor" value="<?php echo $d_row['doctor_id'] ?>">
                                    <input type="hidden" name="patient" value="<?php echo $p_row['patient_id'] ?>">
                                    <input type="submit" class="btn btn-default subscribe-btn btn-noborder" name="subs" value="Subscribe">
                                </form>
                                <form action="unsubscribe.php" method="post" class="subs">
                                    <input type="hidden" name="doctor" value="<?php echo $d_row['doctor_id'] ?>">
                                    <input type="hidden" name="patient" value="<?php echo $p_row['patient_id'] ?>">
                                    <input type="submit" class="btn btn-default subscribe-btn btn-noborder hide" name="unsubs" value="Unsubscribe">
                                </form>
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
                            echo '<div class="col-xs-12 col-md-3">';
                            echo '<div class="clinic-box">';
                            echo '<h2>' . $c_row['clinic_name'] . '<span>' . $count . '</span></h2>';
                            echo '<p>' . $c_row['clinic_location'] . '</p>';
                            echo '<p>' . $c_row['clinic_contact'] . '</p>';
                            echo ' <button type="button" class="btn btn-default create-btn btn-noborder clinic" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="' . $c_row['clinic_id'] . '">
                            <span class="fui-new"> </span>Create Appointment</button>';
                            echo '</div>';
                            echo '</div>';
                            $clinic = $c_row['clinic_id'];
                        }
                        ?>
                    </div>
                </div>

                <?php
                    include 'include/create-modal.php';
                    include 'include/scrolltop.php';
                    include 'include/scripts.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>s
        </div> <!-- /container -->
    </body>
</html>