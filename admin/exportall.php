<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Export";
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

    $account_sql = mysqli_query($con, "SELECT * FROM account WHERE username <> 'Admin'");
    //    $account_row = mysqli_fetch_array($account_sql);
    ?>

    <body class="e4e8e9-bg">
        <?php 
            include 'include/admin-nav.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Download User Account Data
                <span class="h1-btn">
                    <form method="post" action="export_to_file.php">
                        <input type="submit" class="btn btn-default green-btn" name="export" value="Download">
                    </form>
                </span>
            </h1>
            <?php 
                include 'include/database-table.php';
            ?>
        </div>
        <?php
        include 'include/scrolltop.php';
        include 'include/scripts.php';
        ?>
    </body>
</html>