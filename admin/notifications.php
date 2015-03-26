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
    $sql = mysqli_query($con, "SELECT * FROM account WHERE account_status = 'Active' AND username <> 'Admin' ");
    $n_result = mysqli_query($con, "SELECT * FROM notification ORDER BY 6 DESC");
    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">appoint.med</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <div class="btn-group navbar-right signedin">
                        <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            admin
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#">Help</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Reports</a></li>
                    <li><a href="#">Analytics</a></li>
                    <li><a href="#">Import</a></li>
                    <li><a href="exportall.php">Export</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="popdoc.php">Add Doctor</a></li>
                    <li><a href="remove_user.php">Remove user</a></li>
                    <li class="active"><a href="notifications.php">Notification</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="approve.php">Approve Users</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="notification">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <h1 class="text-center row-header">Your Notifications</h1>
            </div>
            <div class="col-md-9 col-md-offset-2">
                <?php
                while ($n_row = mysqli_fetch_array($n_result)) {
                    if ($n_row['indicator'] == 'admin') {
                        $n_id = $n_row['legend_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                        $n_color = mysqli_fetch_array($n_legend);

                        if ($n_color['color'] == 'red') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-danger">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'orange') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-warning">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'green') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-success">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn x-btn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        } else if ($n_color['color'] == 'blue') {
                            echo '<div class="col-xs-12 col-md-8 col-md-offset-2">
                                <div class="panel panel-notif panel-info">
                                    <div class="panel-heading">' . $n_row['notification_date'] . '
                                        <a href="#" title="cancel"><i class="fa fa-remove delete-btn xbtn"></i></a>
                                    </div>
                                    <div class="panel-body">
                                        ' . $n_row['notification'] . '
                                    </div>
                                </div>
                            </div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>