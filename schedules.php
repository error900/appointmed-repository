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
                    <li><a href="#">Notifications <span class="badge">1</span></a></li>
                    <li><a href="#">Completed</a></li>
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
                        <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                        </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid" id="user-md-frw">
        <div class="row">
            <div class="col-md-12 col-md-6 user-md">
                <h1><?php echo $doctor?></h1>
                <span>Benguet Laboratories</span>
                <p>Philippines or sa puso ni macam <3</p>
                <p><?php echo $email?></p>
                <p>+639 0593 493 93</p>
            </div>
            <div class="col-xs-6 col-md-2">
                <div class="text-center circle inqueue">
                    <p>19</p>
                    <span>inqueue</span>
                </div>
            </div>
            <div class="col-xs-6 col-md-2">
                <div class="text-center circle served">
                    <p>05</p>
                    <span>served</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="schedules-md">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-turquoise sched-h">&mdash; Today &mdash;</h2>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">
                    <div class="panel-heading">DR JUAN DELA CRUZ</div>
                    <div class="panel-body">
                        <p>Benguet Laboratories</p>
                        <p>Clinic Info</p>
                        <p>Queue Number</p>
                    </div>
                    <div class="appmnt-pnl-btn">
                        <a href="#"><i class="fa fa-comment"></i> Remarks</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">
                    <div class="panel-heading">DR JUAN DELA CRUZ</div>
                    <div class="panel-body">
                        <p>Benguet Laboratories</p>
                        <p>Clinic Info</p>
                        <p>Queue Number</p>
                    </div>
                    <div class="appmnt-pnl-btn">
                        <a href="#"><i class="fa fa-comment"></i> Remarks</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
        include 'include/footer.php';
    ?>
    <?php
        include 'include/scripts.php';
    ?>

  </body>
</html>