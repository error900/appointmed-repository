<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Secretary Profile";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: admin/index.php");
    else if ($account_type != 'Secretary')
        header("location: admin/index.php");

    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM secretary WHERE username LIKE '$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $secretary = $row['secretary_name'];
    $secretary_id = $row['secretary_id'];

    $email = $row['email'];
    $doctor_id = $row['doctor_id'];

    $doctor = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $doctor_row = mysqli_fetch_array($doctor);

    $c_result = mysqli_query($con, "SELECT * FROM clinic NATURAL JOIN clinic_sec WHERE secretary_id LIKE '$secretary_id'") or die(mysqli_error());

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'");
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="secretary-bg">
        <div class="container">        
            <?php
            include 'include/st-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-schedules.php">Today</a></li>
                        <li><a href="st-schedules_tom.php">Tomorrow</a></li>
                        <li><a href="st-schedules_week.php">This Week</a></li>
                        <li><a href="st-schedules_month.php">This Month</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-completed.php">Finished Schedules</a></li>
                        <li><a href="st-removed.php">Removed Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/st-nav-end.php';
                ?>    
                <!-- /navigation -->
                <div class="container-fluid" id="doctor-info">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-md-offset-2 doctor-photo">
                            <img class="img-responsive" src="img/profile/<?php
                            $file = "img/profile/" . $secretary_id . ".jpg";
                            if (file_exists($file)) {
                                echo $secretary_id;
                            } else {
                                echo 'profile_avatar';
                            }
                            ?>.jpg">
                        </div>
                        <div class="col-xs-12 col-md-5 user-md">
                            <div class="d-info">
                                <h1>Dr. <?php echo $row['secretary_name']; ?></h1>
                                <p><?php echo $doctor_row['doctor_name']; ?></p>
                                <p>Benguet Laboratory Incorporated</p>
                                <p class="email"><?php if($email!=''){echo $email;}else{echo 'No email';} ?></p>
                            </div>
                        </div>          
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        $count = 0;
                        while($c_row = mysqli_fetch_array($c_result)){

                          $count++;
                          echo '<div class="col-xs-12 col-md-3">';
                          echo '<div class="clinic-box dc-profile-sched-panel">';
                          echo '<h2>' . $c_row['clinic_name'] . '<span>' .$count. '</span></h2>';
                          echo '<p><i class="fa fa-location-arrow"></i>'. $c_row['clinic_location']. '</p>' ;
                          echo '<p><i class="fa fa-phone"></i>'. $c_row['clinic_contact'] .'</p>';
                          echo '</div>';
                          echo '</div>';
                          $clinic = $c_row['clinic_id'];
                          } 
                        ?>
                    </div>
                </div>
                <?php
                include 'include/st-edit-profile-modal.php';
                include 'include/refer-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>