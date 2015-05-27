<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Help";
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

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY doctor_name");

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
                <div class="row">
                    <h2 class="row-header text-center">Help</h2>
                </div>
                <script type="text/javascript" src="js/scrolltop.js"></script>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>