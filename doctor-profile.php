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
             $(document).ready(function(){
                   $(".clinic").click(function(){
                     $("#clinic_id").val($(this).data('id'));
                   });
             });
    </script>
     <script type="text/javascript" src="js/subscribeButton.js"></script>
    <script type="text/javascript" src="js/search.js"></script>

    <?php 
        session_start();
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if($loggedIn == false)
            header("location: admin/index.php");
        else if($account_type != 'Doctor')
            header("location: admin/index.php");
        
        $username = $_SESSION['username'];
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'" );
        $d_row =  mysqli_fetch_array($result);
        $doctor = $d_row['doctor_name'];
        $specialization = $d_row['specialization'];
        $email = $d_row['email'];
        $doctor_id = $d_row['doctor_id'];
        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') ORDER BY appointment_id");
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
                            <li><a href="#">Tomorrow</a></li>
                            <li><a href="#">This Week</a></li>
                            <li><a href="#">This Month</a></li>
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
        <!-- /navigation -->
        <div class="container-fluid" id="doctor-info">
            <div class="row">
                <div class="col-xs-12 col-md-2 col-md-offset-3 d-pic">
                      <img class="img-responsive" src="img/profile/<?php 
                            $file = "img/profile/".$doctor_id.".jpg";
                            if(file_exists($file)){
                                echo $doctor_id;
                            }else{
                                echo 'profile';
                            } ?>.jpg">
                </div>
                <div class="col-xs-12 col-md-4 col-md-offset-1">
                    <div class="d-info">
                        <ul class="profile-info">
                            <li><i class="fa fa-user-md"></i>Dr. <?php echo strtoupper($d_row['doctor_name']); ?></li>
                            <li><i class="fa fa-medkit"></i><?php echo $d_row['specialization']; ?></li>
                            <br>
                            <li><i class="fa fa-h-square"></i>Benguet Laboratory Incorporated</li>
                            <li><i class="fa fa-angle-double-right"></i> Plastic Surgery, Cosmetic Surgery</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 text-right">
                    <div class="d-info">
                        <ul>
                            <li class="email"><?php echo $d_row['email']; ?></li>
                        </ul>
                    </div>
                </div>            
            </div>

        </div>
        <div class="container-fluid" id="clinics">
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
        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form class="form-input"  method="post" action="addappointment.php">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputDate">Set Date</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control" name="date" required/>
                                </div>
                                <input type="hidden" value="<?php echo $patient?>" name="patient_id">
                                <input type="hidden" value="<?php echo $doctor_id?>" name="doctor_id">
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
        include 'include/scrolltop.php';
        include 'include/refer-modal.php';
        include 'include/scripts.php';
        include 'include/edit-profile-modal.php';
    ?>
        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div>
  </body>
</html>