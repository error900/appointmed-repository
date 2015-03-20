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

</head>
    <?php
        $title = "Patient Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
  <body>
    <div class="container">
        <?php 
            session_start();
            $loggedIn = $_SESSION['loggedIn'];
            $account_type = $_SESSION['account_type'];
            if($loggedIn == false)
                header("location: index.php");
            else if($account_type != 'Patient')
                header("location: index.php");
            
            //patient
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" ) or die(mysqli_error());
            $row =  mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id'" ) or die(mysqli_error());
            $p_row =  mysqli_fetch_array($p_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id'" ) or die(mysqli_error());
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
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="appointment_month.php">This Month</a></li>
                            </ul>
                        </li>
                        <li><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
                        <li><a href="history.php">History</a></li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>     
        <!-- /navigation -->
        <div class="container-fluid" id="patient-info">
            <div class="row">
                <div class="col-xs-12 col-md-2 col-md-offset-3">
                     <img src="img/profile/<?php 
                            $file = "img/profile/".$patient_id.".jpg";
                            if(file_exists($file)){
                                echo $patient_id;
                            }else{
                                echo 'profile_patient';
                            } ?>.jpg" class="img-responsive">
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <div class="p-info">
                        <ul>
                            <li><i class="fa fa-user"></i><?php echo $row['patient_name']; ?></li>
                            <?php 
                                $birthday = explode("-", $row['birthdate']);
                                $age = (date("md", date("U", mktime(0, 0, 0, $birthday[1], $birthday[2], $birthday[0]))) > date("md")
                                  ? ((date("Y") - $birthday[0]) - 1)
                                  : (date("Y") - $birthday[0]));
                            ?>
                            <li><i class="fa fa-birthday-cake"></i><?php echo $row['birthdate'];?> &mdash; <?php echo $age;?> years old</li>
                            <li><i class="fa fa-briefcase"></i><?php echo $row['occupation'];?></li>
                            <li><i class="fa fa-phone"></i><?php echo $row['patient_contact']; ?></li>
                            <li class="email"><i class="fa fa-envelope"></i><?php echo $row['email']; ?></li>
                        </ul>
                    </div>
                </div>   
            </div>
        </div>
        <div class="container-fluid patient-activity">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center row-header2">Recent Activity</h1>
                </div>
                <?php
                while ($n_row =  mysqli_fetch_array($n_result)){
                    if($n_row['indicator'] == 'patient'){
                    if($n_row['patient_id'] == $patient_id){
                        $n_id = $n_row['legend_id'];
                        $n_did = $n_row['doctor_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'" );
                        $n_color =  mysqli_fetch_array($n_legend);

                        $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'" );
                        $doc =  mysqli_fetch_array($d_result);

                        if ($n_color['color'] == 'blue'){
                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="panel panel-notif panel-info">
                                <div class="panel-heading">'.$doc['doctor_name'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        }
                    }
                }
                }
                ?>
            </div>
        </div>

        <?php
            include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="js/search.js"></script>
    </div>
  </body>
</html>