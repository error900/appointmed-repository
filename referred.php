<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        $title = "Reffered";
        include 'include/head.php';
        include 'connectdatabase.php';
        include 'include/scripts.php';
    ?>
    <script type="text/javascript">
     $(document).ready(function(){
        $('#hideshow').on('click',function(){  
            $('#clinics').show();
       });
        $('#showsec').on('click',function(){  
            $('#secretary').show();
        });

    });
    </script>

     <?php 
        session_start();
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if($loggedIn == false)
            header("location: admin/index.php");
        else if($account_type != 'Doctor')
            header("location: admin/index.php");
        
        $username = $_SESSION['username'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'" ) or die(mysqli_error());
        $row =  mysqli_fetch_array($result);
        $doctor = $row['doctor_name'];
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $specialization = $row['specialization'];

        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM referred WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());

        $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'" ) or die(mysqli_error());
        $count_row = mysqli_fetch_array($count_result);
        $notif_count =  $count_row['count'];
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
                <li>
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
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="completed.php">Done Schedules</a></li>
                        <li><a href="removed.php">Removed Schedules</a></li>
                        <li><a href="referred.php">Referred Schedules</a></li>
                    </ul>
                </li>
    <?php 
        include 'include/dc-nav-end.php';
    ?>
    <div class="container-fluid" id="user-md-frw">
           <div class="col-xs-12 col-md-12">
                <h2 class="text-center row-header">&mdash; Reffered &mdash;</h2>
            </div>
        <?php
            while($row = mysqli_fetch_array($a_result)){
               $patient = $row['patient_id'];
               $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
               $pat = mysqli_fetch_array($p_result);
               echo '<div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">';
                echo'<div class="panel-heading">';
                echo $pat['patient_name'];
                echo '</div>';
                echo' <div class="panel-body">';
                echo '<p>' . $pat['patient_contact'] . '</p>';
                echo '<p>' . $c_row['clinic_location'] . '</p>';
    
                echo '</div>
                 </div>
               </div>';
            }
        ?>

        </div><!-- /.container-fluid -->
     <?php
            include 'include/scrolltop.php';
            include 'include/edit-profile-modal.php';
        ?>
</div> <!-- container -->
  </body>
</html>