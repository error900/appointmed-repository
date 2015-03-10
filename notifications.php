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
        $title = "Appointments";
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
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id'" );
        ?>
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
                        <li class="active"><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
                        <li><a href="history.php">History</a></li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>
        <div class="container-fluid" id="notification">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center text-turquoise appmnt-h">Your Notifications</h1>
                </div>
                <div class="col-md-12">
                    <h2 class="text-left notif-h">Today</h2>
                </div>
                <?php
                while ($n_row =  mysqli_fetch_array($n_result)){
                    if($n_row['indicator'] == 'doctor'){
                    if($n_row['patient_id'] == $patient_id){
                        $n_id = $n_row['notif_id'];
                        $n_did = $n_row['doctor_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notif_legend WHERE notif_id LIKE '$n_id'" );
                        $n_color =  mysqli_fetch_array($n_legend);

                        $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$n_did'" );
                        $doc =  mysqli_fetch_array($d_result);

                        //$n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_did'" );
                        //$n_name =  mysqli_fetch_array($n_patient);
 
                        if($n_color['color'] == 'red'){
                        echo '<div class="col-md-12">
                            <div class="panel panel-notif panel-danger">
                                <div class="panel-heading">'.$doc['doctor_name'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        } else if ($n_color['color'] == 'orange'){
                        echo '<div class="col-md-12">
                            <div class="panel panel-notif panel-warning">
                                <div class="panel-heading">'.$doc['doctor_name'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        }else if ($n_color['color'] == 'green'){
                        echo '<div class="col-md-12">
                            <div class="panel panel-notif panel-success">
                                <div class="panel-heading">'.$doc['doctor_name'].'
                                    <a href="#" title="cancel"><i class="fa fa-remove delete-btn"></i></a>
                                </div>
                                <div class="panel-body">
                                    '.$n_row['notification'].'
                                </div>
                            </div>
                        </div>';
                        } else if ($n_color['color'] == 'blue'){
                        echo '<div class="col-md-12">
                            <div class="panel panel-notif panel-info">
                                <div class="panel-heading">'.$doc['doctor_name'].'
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
