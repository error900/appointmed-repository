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
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>logout</a></li>
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
                    <h1 class="page-header">Announcements </h1> 
                    <div class="input-group announcement-post">
                        <form class="form-input" method="post" action="announcement.php">
                            <div class="col-sm-10">
                                <select name="pick" class="form-control user-select" />
                                    <option value="all">All</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="patient">Patient</option>
                                </select>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                                <div class="col-xs-12 col-md-3 start-date">
                                    <label for="inputDate">Start Date:</label>
                                </div>
                                <div class="col-xs-12 col-md-3 start-date">
                                    <input type="date" class="form-control" name="publish" required/>
                                </div>
                                <div class="col-xs-12 col-md-3 end-date">
                                    <label for="inputDate">End Date:</label>
                                </div>
                                <div class="col-xs-12 col-md-3 end-date">
                                    <input type="date" class="form-control" name="end" required/>
                                </div>
                                <textarea class="form-control" rows="8" name="message" placeholder="Message"></textarea>
                                
                                <div class="post-buttons">
                                    <button type="submit" name="submit" class="btn btn-default blue-btn">post</button>
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
    </body>
</html>
