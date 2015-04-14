<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Dashboard";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>

    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");

    $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);
    ?>
    <body class="e4e8e9-bg">
        <?php
        include 'include/admin-nav-start.php';
        ?>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">Profile</a></li>
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
        </ul>
        <?php
        include 'include/admin-nav-end.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
                 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    
                 </div>
            </div>
        </div>

        <?php
        include 'include/scripts.php';
        include '../include/scrolltop.php';
        ?>
        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="../js/scrolltop.js"></script>

    </body>
</html>