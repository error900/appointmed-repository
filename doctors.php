<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "appoint.med | Doctors";
    include 'include/head.php';
    include 'connectdatabase.php';
    ?>
    <body class="e4e8e9-bg">
        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])) {
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                if ($loggedIn == true && $account_type == 'Patient')
                    header("location: appointment.php");
                else
                    header("doctors.php");
            }
            ?>
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
                        <a class="navbar-brand hidden-lg hidden-md" href="#">benguet labs</a>
                        <a class="navbar-brand logo-text hidden-sm hidden-xs" href="#">appoint.med</a>
                        <div class="navbar-logo hidden-sm hidden-xs">
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav nav-parent">
                            <li class="tooltip-bottom" data-tooltip="Home"><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>
                            <li class="tooltip-bottom" data-tooltip="Company Profile"><a href="companyprofile.php"><i class="fa fa-info-circle fa-lg"></i>Company Profile</a></li>
                            <li class="active tooltip-bottom" data-tooltip="Doctors"><a href="doctors.php"><i class="fa fa-user-md fa-lg"></i>Doctors</a></li>
                            <li class="tooltip-bottom" data-tooltip="Signup"><a href="signup.php"><i class="fa fa-pencil-square-o fa-lg"></i>Sign-up</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                            <button type="button" class="btn btn-default btn-noborder green-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h1 class="text-center row-header">Benguet LAboratories</h1>
                    </div>
                </div>
                <?php
                    include 'include/doctors-full-list.php'; 
                ?>
                <?php
                include 'include/user-login.php';
                include 'include/scrolltop.php';
                include 'include/scripts.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
            </div> <!-- /container -->
    </body>
</html>