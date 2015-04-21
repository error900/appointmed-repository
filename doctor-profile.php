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
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'") or die(mysqli_error());
    $d_row = mysqli_fetch_array($result);
    $doctor = $d_row['doctor_name'];
    $specialization = $d_row['specialization'];
    $email = $d_row['email'];
    $doctor_id = $d_row['doctor_id'];
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'") or die(mysqli_error());
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
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
                                <ul class="profile-info">
                                    <li><i class="fa fa-user-md"></i>Dr. <?php echo strtoupper($doctor); ?></li>
                                    <li><i class="fa fa-medkit"></i><?php echo $specialization; ?></li>
                                    <li><i class="fa fa-envelope"></i><?php echo $email; ?></li>
                                    <br>
                                    <li><i class="fa fa-h-square"></i>Benguet Laboratories</li>
                                </ul>
                            </div>
                        </div>   
                        <div>
                            <div class="d-info">
                                <ul>
                                    <li class="profile-info">Status:<span><?php echo($d_row['doctor_status']); ?></span></li>
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
                            echo ' <button type="button" class="btn btn-default clinic create-btn btn-noborder tooltip-bottom" data-tooltip="Set limit" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="' . $c_row['clinic_id'] . '">
                            <i class="fa fa-edit fa-lg"></i></button>';
                            echo '</div>';
                            echo '</div>';
                            $clinic = $c_row['clinic_id'];
                        }
                        ?>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form class="form-input"  method="post" action="addappointment.php">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Set limit</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputDate">Number of patients you can accomodate for the clinic</label>
                                    <select name="limit_no" class="form-control">
                                        <option selected>Year
                                            <?php for ($i = 50; $i >= 5; $i--) { ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                        <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                                        <input type="hidden" value="" id="clinic_id" name="clinic_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <?php
                                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Appoint Me</button>";
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
             //   include 'include/refer-modal.php';
                include 'include/edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>