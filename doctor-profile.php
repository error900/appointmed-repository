<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Doctor Profile";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() { 
                $("#clinic_id").val($(this).data('id'));
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
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'") or die(mysqli_error());
    $d_row = mysqli_fetch_array($result);
    $doctor = $d_row['doctor_name'];
    $specialization = $d_row['specialization'];
    $email = $d_row['email'];
    $doctor_id = $d_row['doctor_id'];
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
    $count_row = mysqli_fetch_array($count_result);
    $count_announcement = mysqli_query($con, "SELECT * FROM announcement");
    $notif_count = $count_row['count'];
    $announcement_count = mysqli_num_rows($count_announcement);
    $notif_count2 = $notif_count + $announcement_count;
    $date_today = date('Y-m-d');
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/dc-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="dropdown tooltip-right" data-tooltip="Schedules">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="schedules_tom.php">Tomorrow</a></li>
                        <li><a href="schedules_week.php">This Week</a></li>
                        <li><a href="schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="tooltip-right" data-tooltip="Notifications">
                    <a href="doc_notifications.php">
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
                        <li><a href="completed.php">Finished Schedules</a></li>
                        <li><a href="removed.php">Removed Schedules</a></li>
                        <li><a href="referred.php">Referred Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/dc-nav-end.php';
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
                        <div class="col-xs-12 col-md-5">
                            <div class="d-info">
                                <ul class="text-black">
                                    <li><i class="fa fa-user-md"></i>Dr. <?php echo strtoupper($doctor); ?></li>
                                    <li><i class="fa fa-medkit"></i><?php echo $specialization; ?></li>
                                    <li class="email"><i class="fa fa-envelope"></i><?php echo $email; ?></li>
                                    <br>
                                    <li><i class="fa fa-h-square"></i>Benguet Laboratories</li>
                                </ul>
                            </div>
                        </div>   
                        <div class="col-xs-12 col-md-3 text-center">
                            <div class="d-info">
                                <ul>
                                    <li class="text-black">Status:<span><?php echo($d_row['doctor_status']); ?></span></li>
                                </ul>
                            </div>  
                        </div>       
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $count = 0;
                        while ($c_row = mysqli_fetch_array($c_result)) {

                            $count++;
                            echo '<div class="col-xs-12 col-md-3">';
                            echo '<div class="clinic-box dc-profile-sched-panel">';
                            echo '<h2>' . $c_row['clinic_name'] . '<span>' . $count . '</span></h2>';
                            echo '<p><i class="fa fa-location-arrow"></i>' . $c_row['clinic_location'] . '</p>';
                            echo '<p><i class="fa fa-phone"></i>' . $c_row['clinic_contact'] . '</p>';
                            echo '<p class="cutoff">Cut off limit: <i></i>' . $c_row['cut_off_no'] . '</p>';
                            echo ' <button type="button" class="btn btn-default appo red-btn2 btn-noborder tooltip-bottom" data-tooltip="Settings" data-toggle="modal" data-target=".settings-modal-sm" data-id="' . $c_row['clinic_id'] . '">
                            <i class="fa fa-gears"></i></button>';
                            echo '</div>';
                            echo '</div>';
                            $clinic = $c_row['clinic_id'];
                        }
                        ?>
                        <div class="col-xs-12 col-md-3">
                            <div>
                              <?php  
                              echo '<button type="button" class="btn btn-default appo btn-noborder add-clinic-btn tooltip-right" data-tooltip="Add Clinic" data-toggle="modal" data-target=".addClinic-modal-sm" data-c-id="'. $clinic .'"><i class="fa fa-plus"></i></button>';
                              ?>  
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include 'include/edit-profile-modal.php';
                include 'include/settings-addClinic-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>