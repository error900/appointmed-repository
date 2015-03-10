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
        //$a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id = '$doctor_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') ORDER BY appointment_id");
        //$sqls = mysqli_query($con, "SELECT * FROM doctor WHERE specialization LIKE '$specialization' AND doctor_id <> '$doctor_id'" );
        $n_result = mysqli_query($con, "SELECT * FROM notification WHERE doctor_id LIKE '$doctor_id'" );

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
                    <li >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Today <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Tomorrow</a></li>
                            <li><a href="#">This Week</a></li>
                            <li><a href="#">This Month</a></li>
                        </ul>
                    </li>
                    <li class="active dropdown"><a href="#">Notifications <span class="badge">1</span></a></li>
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
         </div> <!-- /container -->
  </body>
</html>
   