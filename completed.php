<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        $title = "Schedules";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
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
        $email = $row['email'];
        $doctor_id = $row['doctor_id'];
        $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'");
        $c_row = mysqli_fetch_array($c_result);
        $a_result = mysqli_query($con, "SELECT * FROM appointment WHERE doctor_id LIKE '$doctor_id' AND appointment_status = 'Completed' ORDER BY appointment_id")
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
                            <li><a href="schedules.php">Tomorrow</a></li>
                            <li><a href="schedules.php">This Week</a></li>
                            <li><a href="schedules.php">This Month</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Notifications <span class="badge">1</span></a></li>
                    <li class="active dropdown"><a href="completed.php">Completed</a></li>
                    <li><a href="#">Removed</a></li>
                    <li><a href="#">Referred</a></li>
                </ul>
                <div class="btn-group navbar-right signedin">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $doctor?>
                        <span class="caret"></span>
                    </button>
                        <ul class="dropdown-menu" role="menu">
                        <li><a href="profile.php">Edit Profile</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                        </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </nav>
        <?php
            while($row = mysqli_fetch_array($a_result)){
               $patient = $row['patient_id'];
               $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
               $pat = mysqli_fetch_array($p_result);
               echo '<div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">';
                echo'<div class="panel-heading">';
                echo $pat['patient_name'];
                echo '</div>';
                echo' <div class="panel-body">';
                echo '<p>' . $pat['patient_contact'] . '</p>';
                echo '<p>' . $c_row['clinic_location'] . '</p>';
                echo '<p> Queue Number: ' . $row['appointment_id'] . '</p>';
                echo '</div>
                    <div class="appmnt-pnl-btn">
                        <a href="#"><i class="fa fa-comment"></i> Remarks</a>
                    </div>
                 </div>
               </div>';
            }
        ?>

        </div><!-- /.container-fluid -->
    </nav>
     <?php
            include 'include/scripts.php';
            include 'include/scrolltop.php';
        ?>

  </body>
</html>