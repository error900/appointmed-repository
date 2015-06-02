<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Front Desk | Inqueue Details";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");
    $username = $_SESSION['username'];
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
             include 'include/fd-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="tooltip-bottom" data-tooltip="Online Doctors">
                    <a href="index.php"><i class="fa fa-users fa-lg"></i>On Deck</a>
                </li>
            <?php
            include 'include/fd-nav-end.php';
            ?>
                <div class="container-fluid" id="frontdesk-md">
                    <div class="row">
                        <div class="col-xs-12 col-md-2 col-md-offset-1 doctor-photo hidden-xs hidden-sm">
                            <img class="img-responsive" src="img/profile/profile.jpg">
                        </div>
                        <div class="col-xs-12 col-md-5 user-md">
                            <div class="d-info">
                                    <h1>Dr. Juan Dela Cruz</h1>
                                    <p class="clinic-days">Mon/Wed/Fri</p>
                                    <p class="clinic-times">7:00-9:00</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center row-header-black">&mdash; Patients Inqueue &mdash;</h1>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Patient Name</h4>
                                    <p class="list-group-item-text">Online</p>
                                    <p class="list-group-item-text">Queue# 1</p>
                                    <a href="#" class="list-group-item">cancel</a>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Patient Name</h4>
                                    <p class="list-group-item-text">Walk-in</p>
                                    <p class="list-group-item-text">Queue# 2</p>
                                    <a href="#" class="list-group-item">cancel</a>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Patient Name</h4>
                                    <p class="list-group-item-text">Walk-in</p>
                                    <p class="list-group-item-text">Queue# 3</p>
                                    <a href="#" class="list-group-item">cancel</a>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Patient Name</h4>
                                    <p class="list-group-item-text">Online</p>
                                    <p class="list-group-item-text">Queue# 4</p>
                                    <a href="#" class="list-group-item">cancel</a>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">Patient Name</h4>
                                    <p class="list-group-item-text">Online</p>
                                    <p class="list-group-item-text">Queue# 5</p>
                                    <a href="#" class="list-group-item">cancel</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                include 'include/add_to_queue.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>