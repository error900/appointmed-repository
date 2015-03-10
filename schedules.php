<!DOCTYPE html>
<html lang="en">
  <head>


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
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE username LIKE '$username'" );
        $row =  mysqli_fetch_array($result);
        $doctor = $row['doctor_name'];
        $specialization = $row['specialization'];
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') ORDER BY appointment_id");
        $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'" );
    ?>
  <body class="fff-bg">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">appoint.med</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Today <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Tomorrow</a></li>
                            <li><a href="#">This Week</a></li>
                            <li><a href="#">This Month</a></li>
                        </ul>
                    </li>
                    <li><a href="doc_notifications.php">Notifications <span class="badge">1</span></a></li>
                    <li><a href="completed.php">Completed</a></li>
                    <li><a href="#">Removed</a></li>
                    <li><a href="#">Referred</a></li>
                </ul>
                <div class="btn-group navbar-right signedin">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $doctor?>
                        <span class="caret"></span>
                    </button>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="admin/logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                        </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
 <div class="container-fluid" id="user-md-frw">
        <div class="row">
            <div class="col-md-12 col-md-6 user-md">
                <h1><?php echo $doctor; ?></h1>
                <span><?php echo $row['specialization']; ?></span>
                <p><?php echo $c_row['clinic_location']; ?></p>
                <p><?php echo $row['email']; ?></p>
                <p><?php echo $c_row['clinic_contact']; ?></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <div class="text-center circle inqueue">
                    <?php 
                        $count_row = mysqli_query($con, "SELECT COUNT(*) AS Appointments FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') ");
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
            <div>

            </div>
        </div>
    </div>

    <div class="container-fluid" id="schedules-md">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-turquoise sched-h">&mdash; Today &mdash;</h2>
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
                echo '<input type="hidden" id="appointment_id" value="'.$appointment_id.'" name="appointment_id">';
              //  echo "<a href=\"doctor_close.php?id=$row[appointment_id]&doc=$doctor_id&pat=$patient\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
               // <div class=\"panel-body\">";
                echo '</div>';
                echo' <div class="panel-body">';
                echo $pat['patient_contact'];
                echo '<p>' . $c_row['clinic_location'] . '</p>';
                echo '<p> Queue Number: ' . $appointment_id . '</p>';
                
             
                 echo ' <button type="button" class="btn btn-block btn-inverse appo" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="'.$appointment_id.'" data-patient-id="'.$patient.'">
                            <span class="fui-new"> </span>Refer to Other Doctor</button>
                         </div>';
    

                 echo'  <div class="appmnt-pnl-btn">
                        <a href="#"><i class="fa fa-comment"></i> Remarks</a>
                    </div>
                 </div>
               </div>';
            }
        ?>

        </div>
    </div>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Refer</h4>
                  </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <form class="form-input"  method="post" action="referral.php">
                                <label for="inputDate">Choose Doctor: </label>
                                <select name="referred_id" required>

                                        <?php 
                                           while ($row2 = mysqli_fetch_array($sqls)){
                                        ?>
                                <option value='<?php echo $row2['doctor_id']?>' ><?php echo $row2['doctor_name']?></option> ;
                                          <?php   } ?>

                                </select>                                      
                                <input type="hidden" id="pat_id" value="" name="patient_id">
                                <input type="hidden" value="<?php echo $doctor_id?>" name="doctor_id">
                                <input type="hidden" id="appo_id" value="" name="appointment_id">
                    
                           <?php            
                                echo '<div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                                echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Refer</button>
                                </div>";
                            ?>
                            </form>
                        </div>
                    </div>

 <?php
      
        ?>

  </body>
</html>