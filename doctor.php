<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Doctor Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
//        include 'include/datepicker.php';
        include 'include/scrolltop.php';
        include 'include/scripts.php';

    ?>
         <script type="text/javascript">
             $(document).ready(function(){
                   $(".clinic").click(function(){
                     $("#clinic_id").val($(this).data('id'));
                   });
             });
    </script>
  <body>
    <div class="container">
        <?php 
            session_start();
            if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type']) && isset($_SESSION['username'])){
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                $username = $_SESSION['username'];

                if($loggedIn == false)
                    header("location: index.php");
                else if($account_type != 'Patient')
                    header("location: index.php");   
            }else{
                header("location: index.php");
                die();
            }
            $doctor_id= mysqli_real_escape_string($con, $_GET['id']);
            //patient
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $row =  mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];

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

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'" );
            $count_row = mysqli_fetch_array($count_result);
            $notif_count =  $count_row['count'];
        ?>
        <!-- navigation -->
        <?php 
            include 'include/pt-nav-start.php';
        ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Appointments<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="appointment_month.php">This Month</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="notifications.php">
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointments_done.php">Appointments Done</a></li>
                                <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
                            </ul>
                        </li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>     
        <!-- /navigation -->
        <div class="container-fluid" id="doctor-info">
            <div class="row">
                <div class="col-xs-12 col-md-2 col-md-offset-2 doctor-photo">
                      <img class="img-responsive" src="img/profile/<?php 
                            $file = "img/profile/".$doctor_id.".jpg";
                            if(file_exists($file)){
                                echo $doctor_id;
                            }else{
                                echo 'profile';
                            } ?>.jpg">
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="d-info">
                        <ul>
                            <li><i class="fa fa-user-md"></i>Dr. <?php echo strtoupper($d_row['doctor_name']); ?></li>
                            <li><i class="fa fa-medkit"></i><?php echo $d_row['specialization']; ?></li>
                            <li class="email"><i class="fa fa-envelope"></i> <?php echo $d_row['email']; ?></li>
                            <br>
                            <li><i class="fa fa-h-square"></i>Benguet Laboratories</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 text-center">
                    <div class="d-info">
                        <ul>
                            <li class="doc-status">The Doctor is: <span><?php echo($d_row['doctor_status']);?></span></li>
                        </ul>
                    </div>  
                </div>
                <div class="col-xs-12 col-md-2 text-center">
                    <?php $sql = mysqli_query($con, "SELECT * FROM subscribe WHERE patient_id LIKE '$patient_id' AND doctor_id LIKE '$doctor_id'") or die(mysqli_error());
                       
                    if(mysqli_num_rows($sql) ==0){
                        echo '<form action="subscribe.php" method="post" class="subs">';
                        echo '<input type="hidden" name="doctor" value="'.$d_row["doctor_id"].'">
                        <input type="hidden" name="patient" value="'.$row["patient_id"].'">';
                        echo '<input type="submit" class="btn btn-default red-btn btn-noborder" name="subs" value="Follow">';
                        echo '</form> '; 
                    }else{
                        echo '<form action="unsubscribe.php" method="post" class="subs">';
                        echo '<input type="hidden" name="doctor" value="'.$d_row["doctor_id"].'">
                        <input type="hidden" name="patient" value="'.$row["patient_id"].'">';
                        echo '<input type="submit" class="btn btn-default red-btn btn-noborder" name="unsubs" value="Unfollow">';
                        echo '</form> '; 
                        }     
                    ?>
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
                        echo '<h2>' . $c_row['clinic_name'] . '<span>' .$count. '</span></h2>';
                        echo '<p><i class="fa fa-location-arrow"></i>'. $c_row['clinic_location']. '</p>' ;
                        echo '<p><i class="fa fa-phone"></i>'. $c_row['clinic_contact'] .'</p>';
                        echo ' <button type="button" class="btn btn-default clinic create-btn btn-noborder tooltip" title="create appointment" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="'.$c_row['clinic_id'].'">
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
                            <h4 class="modal-title" id="myModalLabel">Create</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="inputDate">Set Date</label>
                                <div class="input-group date" id="datetimepicker1">
                                    <input type="date" class="form-control" name="date" required/>
                                </div>
                                <input type="hidden" value="<?php echo $patient_id?>" name="patient_id">
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

    </div>
    <?php 
            include 'include/edit-profile-modal.php';
    ?>
    <script type="text/javascript" src="js/search.js"></script>    
  </body>
</html>