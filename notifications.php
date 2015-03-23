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
    <?php
        $title = "Notifications";
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
            
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $row =  mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id'" );
            $p_row =  mysqli_fetch_array($p_result);
            //$doctor = $p_row['doctor_id'];
            //$date = $p_row['appoint_date'];
            //$d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'" );
            //$doc =  mysqli_fetch_array($d_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id' ORDER BY 6 DESC" );

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'" );
            $count_row = mysqli_fetch_array($count_result);
            $notif_count =  $count_row['count'];
        ?>
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
                        <li class="active"><a href="notifications.php">Notifications <span class="badge"><?php echo $notif_count?></span></a></li>
                        <li><a href="history.php">History</a></li>
                        <li class="nav-button navbar-right">
                            <button type="button" class="btn btn-default btn-noborder edit-profile-btn" data-toggle="modal" data-target=".bs-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                            <i class="fa fa-pencil"></i>Edit Profile</button>
                        </li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>
        <div class="container-fluid" id="notification">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center row-header-fff">&mdash; Your Notifications &mdash;</h1>
                </div>
                <div class="col-md-12">
                    <h2 class="text-left date-header">Today</h2>
                </div>
                <?php
                while ($n_row =  mysqli_fetch_array($n_result)){
                    if($n_row['indicator'] == 'doctor'){
                    if($n_row['patient_id'] == $patient_id){
                        $n_id = $n_row['legend_id'];
                        $n_did = $n_row['doctor_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'" );
                        $n_color =  mysqli_fetch_array($n_legend);

                        $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'" );
                        $doc =  mysqli_fetch_array($d_result);

                        //$n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_did'" );
                        //$n_name =  mysqli_fetch_array($n_patient);
 
                        if($n_color['color'] == 'red'){
                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="panel panel-notif panel-danger">
                                <div class="panel-heading">'.$doc['doctor_name'].' '.$n_row['notification_date'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        } else if ($n_color['color'] == 'orange'){
                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="panel panel-notif panel-warning">
                                <div class="panel-heading">'.$doc['doctor_name'].' '.$n_row['notification_date'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        }else if ($n_color['color'] == 'green'){
                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="panel panel-notif panel-success">
                                <div class="panel-heading">'.$doc['doctor_name'].' '.$n_row['notification_date'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        } else if ($n_color['color'] == 'blue'){
                        echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                            <div class="panel panel-notif panel-info">
                                <div class="panel-heading">'.$doc['doctor_name'].' '.$n_row['notification_date'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
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
    </div> <!-- /container -->
  </body>
</html>
