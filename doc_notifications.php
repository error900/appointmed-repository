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
        //$a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') ORDER BY appointment_id");
        //$sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'" );
        $n_result = mysqli_query($con, "SELECT * FROM notification WHERE doctor_id LIKE '$doctor_id'" );

        ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="schedules.php">appoint.med</a>
            </div>
        <ul class="nav navbar-nav">
            <li class="dropdown active">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="schedules.php">Today</a></li>
                        <li><a href="#">Tomorrow</a></li>
                        <li><a href="#">This Week</a></li>
                        <li><a href="#">This Month</a></li>
                    </ul>
            </li>
            <li><a href="doc_notifications.php">Notifications <span class="badge">22</span></a></li>
            <li><a href="history.php">History</a></li>
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
            </div><!-- /.container-fluid -->
        </nav>
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
                    if($n_row['indicator'] == 'patient'){
                    if($n_row['doctor_id'] == $doctor_id){
                        $n_id = $n_row['notif_id'];
                        $n_pid = $n_row['patient_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notif_legend WHERE notif_id LIKE '$n_id'" );
                        $n_color =  mysqli_fetch_array($n_legend);

                        $n_patient = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$n_pid'" );
                        $n_name =  mysqli_fetch_array($n_patient);
 
                        if($n_color['color'] == 'red'){
                        echo '<div class="col-md-12">
                            <div class="panel panel-notif panel-danger">
                                <div class="panel-heading">'.$n_name['patient_name'].'
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
                                <div class="panel-heading">'.$n_name['patient_name'].'
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
                                <div class="panel-heading">'.$n_name['patient_name'].'
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
                                <div class="panel-heading">'.$n_name['patient_name'].'
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
            include 'include/scrolltop.php';
        ?>
        <script type="text/javascript" src="js/search.js"></script>
    </div> <!-- /container -->
  </body>
</html>
