<!DOCTYPE html>
<html lang="en">


    <?php
    $title = "Admin | Announcements";
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


    if (isset($_POST['submitted'])) {
        print_r($_POST);
    }
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
        ?>
    <div class="container-fluid">
        <div class="row">
        <?php
        include 'include/sidebar-navigation.php';
        ?>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main announcement">
                <h1 class="page-header">Announcements </h1> 
                <div class="input-group announcement-post">
                    <form class="form-input" method="post" action="">
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="" name="title" placeholder="Title">
                            <label>Start Date:</label>
                            <input type="date" class="form-control" value="" name="">
                            <label>End Date:</label>
                            <input type="date" class="form-control" value="" name="">
                            <textarea class="form-control" rows="8" name="message" ></textarea>
                            <div class="post-buttons">
                                <button type="button" name="postButton" class="btn btn-default">Post Info</button>
                                <button type="button" name="cancelButton" class="btn btn-primary">cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php
        include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="js/listslide.js"></script>

    </body>
</html>
