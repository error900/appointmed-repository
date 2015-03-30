<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Dashboard";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';
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
                <li><a href="#">Settings</a></li>
                <li><a href="#">Help</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
            </ul>
            <?php
            include 'include/admin-nav-end.php';
            ?>s

        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-4 col-md-offset-2 main">
            <h1 class="page-header">Export</h1>
            <form method="post" action="export_to_file.php">
                <input type="submit" class="btn btn-default export-btn btn-noborder" name="export" value="Export Users List">
            </form>
        </div>
            <?php
            include 'include/scripts.php';
            ?>
            <script type="text/javascript" src="js/listslide.js"></script>
    </body>
</html>