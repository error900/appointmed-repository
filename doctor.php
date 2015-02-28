<!DOCTYPE html>
<html lang="en">
<head>
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
            box-shadow: 0px 0px 5px #999;
            border-width: 3px 1px 1px;
            border-style: solid;
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
    </style>
</head>
    <?php
        $title = "Doctor Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
  <body>
    <div class="container">
        <?php 
            session_start();
            $loggedIn = $_SESSION['loggedIn'];

            $doctor_id= mysqli_real_escape_string($con, $_GET['id']);
            $account_type = $_SESSION['account_type'];
            if($loggedIn == false)
                header("location: index.php");
            else if($account_type != 'Patient')
                header("location: index.php");
            
            //patient
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $p_row =  mysqli_fetch_array($result);
            $patient = $p_row['patient_id'];
            $patient_n = $p_row['patient_name'];

            //clinic
            $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
          
            //appointment
            $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND appointment_status = 'inqueue' ORDER BY appointment_id");

            //doctor
            $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'" );
            $d_row =  mysqli_fetch_array($result);
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
                <div class="col-md-4 d-pic">
                      <img src="img/profile/<?php 
                            $file = "img/profile/".$doctor_id.".jpg";
                            if(file_exists($file)){
                                echo $doctor_id;
                            }else{
                                echo 'profile';
                            } ?>.jpg">
                </div>
                <div class="col-md-5">
                    <div class="d-info">
                        <ul class="specs">
                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
                            <li>LUt enim ad minim veniam nostrud exercitation ullamco laboris nisi</li>
                            <br>
                            <li>Hospital Affiliations: Benguet Laboratory Incorporated</li>
                            <li>Specialties: Plastic Surgery, Cosmetic Surgery</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <div class="d-info">
                        <ul>
                            <li><?php echo strtoupper($d_row['doctor_name']); ?></li>
                            <li><?php echo $d_row['specialization']; ?></li>
                            <li><?php echo $d_row['email']; ?></li>
                            <li>Status: <?php echo strtoupper($d_row['doctor_status']);?></li>
                        </ul>
                        <form action="subscribe.php" method="post" class="subs">
<<<<<<< HEAD
                            <input type="hidden" name="doctor" value="<?php echo $row['doctor_id']?>">
                            <input type="hidden" name="patient" value="<?php echo $p_row['patient_id']?>">
                            <input type="submit" class="btn btn-default" name="subs" value="Subscribe">
                            <input type="submit" class="btn btn-default" name="unsubs" value="Unsubscribe">
=======
                            <input type="hidden" name="doctor" value="<?php echo $d_row['doctor_id']?>">
                            <input type="hidden" name="patient" value="<?php echo $row['patient_id']?>">
                            <input type="submit" class="btn btn-default btn-noborder" name="subs" value="Subscribe">
                            <input type="submit" class="btn btn-default btn-noborder" name="unsubs" value="Unsubscribe">
>>>>>>> origin/master
                        </form>
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
                        echo '<div class="clinic-box">';
                        echo '<h4> Clinic '.$count.'</h4>';
                        echo '<p>'. $c_row['clinic_name']. '</p>' ;
                        echo '<p>'. $c_row['clinic_location']. '</p>' ;
                        echo '<p>'. $c_row['clinic_contact'] .'</p>';
                        echo ' <button type="button" class="btn btn-default create-btn" data-toggle="modal" data-target=".bs-example-modal-sm">
                            <span class="fui-new"> </span>Create Appointment</button>';
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
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create</h4>
                  </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form class="form-input"  method="post" action="addappointment.php">
                                <label for="inputDate">Set Date</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <span class="input-group-addon">
                                        <span class="fui-calendar-solid"></span>
                                    </span>
                                    <input type="text" class="form-control" name="date" required/>
                                </div>
                                    <input type="hidden" value="<?php echo $patient?>" name="patient_id">
                                    <input type="hidden" value="<?php echo $doctor_id?>" name="doctor_id">
                                    <input type="hidden" value="<?php echo $clinic?>" name="clinic_id">
                        </div>
                    </div>
                    <?php
                    echo '<div class="modal-footer">';
                        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                        echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Appoint Me</button>";
                    echo '</div>';
                    ?>
                    </form>
                </div>
              </div>
            </div>

        <?php
            include 'include/scripts.php';
            include 'include/datepicker.php';
        ?>
               <script type="text/javascript" src="js/search.js"></script>
    </div>
  </body>
</html>