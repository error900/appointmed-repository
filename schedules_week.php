<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Schedules";
        include 'include/head.php';
        include 'connectdatabase.php';
        include 'include/scripts.php';
        include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
     $(document).ready(function(){
           $(".appo").click(function(){ // Click to only happen on announce links
             $("#appo_id").val($(this).data('id'));
             $("#pat_id").val($(this).data('patient-id'));
           });
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

        $start = date("Y-m-d", strtotime('monday this week'));
        $end = date("Y-m-d", strtotime('sunday this week'));
        $date = date("Y-m-d");
        $username = $_SESSION['username'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'" );
        $row =  mysqli_fetch_array($result);
        $doctor = $row['doctor_name'];
        $specialization = $row['specialization'];
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') AND (appoint_date >= '$start' AND appoint_date <= '$end') ORDER BY appointment_id");
        $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'" );
    
        $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'" );
        $count_row = mysqli_fetch_array($count_result);
        $notif_count =  $count_row['count'];
    ?>
  <body class="e4e8e9-bg">
    <div class="container">        
    <?php 
        include 'include/dc-nav-start.php';
    ?>
                <ul class="nav navbar-nav">
                    <li class="active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Schedules <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="schedules.php">Today</a></li>
                            <li><a href="schedules_tom.php">Tomorrow</a></li>
                            <li><a href="#">This Week</a></li>
                            <li><a href="schedules_month.php">This Month</a></li>
                        </ul>
                    </li>
                    <li><a href="doc_notifications.php">Notifications <span class="badge"><?php echo $notif_count?></span></a></li>
                    <li><a href="completed.php">Completed</a></li>
                    <li><a href="removed.php">Removed</a></li>
                    <li><a href="referred.php">Referred</a></li>
                    <li class="nav-button">
                        <form action="export.php" method="post">
                            <input type="hidden" name="doctor_id" value="<?php echo $doctor_id?>">
                            <input type="submit" class="btn btn-default export-btn btn-noborder" value="Export" name="submit">
                        </form>
                    </li>
                    <li class="nav-button navbar-right">
                        <button type="button" class="btn btn-default btn-noborder edit-profile-btn" data-toggle="modal" data-target=".bs-dc-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                        <i class="fa fa-pencil"></i>Edit Profile</button>
                    </li>
    <?php 
        include 'include/dc-nav-end.php';
    ?>
 <div class="container-fluid" id="user-md-frw">
        <div class="row">
            <div class="col-md-12 col-md-4 col-md-offset-2 user-md">
                <h1><?php echo $doctor; ?></h1>
                <p><?php echo $row['specialization']; ?></p>
                <p><?php echo $c_row['clinic_location']; ?></p>
                <p class="email"><?php echo $row['email']; ?></p>
                <p><?php echo $c_row['clinic_contact']; ?></p>
            </div>
            <div class="col-xs-6 col-md-2 col-md-offset-1">
                <div class="text-center circle inqueue">
                    <?php 
                        $count_row = mysqli_query($con, "SELECT COUNT(*) AS Appointments FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND appoint_date = '$date' ");
                        $count = mysqli_fetch_assoc($count_row);
                        if($count == 0)
                            echo '<p>'.'0'.'</p>';
                        else
                            echo '<p>'. $count['Appointments'] . '</p>';
                     ?>
                    <span>inqueue</span>
                </div>
            </div>
            <div class="col-xs-6 col-md-2">
                <div class="text-center circle served">
                     <?php 
                        $count_row1 = mysqli_query($con, "SELECT COUNT(*) AS Appointments FROM appointment WHERE doctor_id = '$doctor_id' AND appointment_status = 'Completed' ");
                        $count1 = mysqli_fetch_assoc($count_row1);
                        if($count1 == 0)
                            echo '<p>'.'0'.'</p>';
                        else
                            echo '<p>'.$count1['Appointments'].'</p>';
                     ?>
                    <span>served</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="schedules-md">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center row-header">&mdash; This Week &mdash;</h2>
            </div>

        <?php
            while($row = mysqli_fetch_array($a_result)){
               $patient = $row['patient_id'];
               $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
               $pat = mysqli_fetch_array($p_result);
               $appointment_id = $row['appointment_id'];
               echo '<div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">';
                echo'<div class="panel-heading">';
                echo $pat['patient_name'];
                echo '<p class="queue-num">' . $appointment_id . '</p>';
                echo '<input type="hidden" id="appointment_id" value="'.$appointment_id.'" name="appointment_id">';
              //  echo "<a href=\"doctor_close.php?id=$row[appointment_id]&doc=$doctor_id&pat=$patient\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
               // <div class=\"panel-body\">";
                echo '</div>';
                echo' <div class="panel-body">';
                echo $pat['patient_contact'];
                echo '<p> Queue Number: <span>' . $appointment_id . '</span></p>';
                
             
                 echo ' 
                         </div>';
    

                 echo'  div class="appmnt-pnl-btn">
                            <button type="button" class="btn btn-default btn-inverse appo btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="'.$appointment_id.'" data-patient-id="'.$patient.'">
                            Refer<i class="fa fa-hand-o-right"></i></button> 
                        </div>
                        <div class="appmnt-pnl-btn-2">
                           <button type="button" class="btn btn-default btn-inverse appo btn-noborder" data-toggle="modal" data-target=".bs-remarks-modal-sm" data-a-id="'.$appointment_id.'" data-patient-id="'.$patient.'">
                           Remarks<i class="fa fa-comment"></i></button>
                        </div>
                 </div>
               </div>';
            }
        ?>


        </div>
    </div>
    <?php 

        include 'include/refer-modal.php';
        include 'include/remarks-modal.php';
        include 'include/edit-profile-modal.php';

    ?>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div>
  </body>
</html>