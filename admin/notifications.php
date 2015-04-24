<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Notifications";
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
    $sql = mysqli_query($con, "SELECT * FROM account WHERE account_status = 'Active' AND username <> 'Admin' ");
    $n_result = mysqli_query($con, "SELECT * FROM notification ORDER BY 6 DESC");
    $count_rows = mysqli_query($con, "SELECT * FROM notification WHERE indicator = 'admin'");
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
                <h1 class="page-header">Your Notifications</h1>

                <?php
                if(mysqli_num_rows($count_rows)>=1){
                while ($n_row = mysqli_fetch_array($n_result)) {
                    if ($n_row['indicator'] == 'admin') {
                        $n_id = $n_row['legend_id'];

                        $n_legend = mysqli_query($con, "SELECT * FROM notification_legend WHERE legend_id LIKE '$n_id'");
                        $n_color = mysqli_fetch_array($n_legend);

                        if ($n_color['color'] == 'red') {
                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-danger'>
                                    <div class='panel-heading'>" . $n_row['notification_date'] . "
                                       <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "
                                    </div>
                                </div>
                            </div>";
                        } else if ($n_color['color'] == 'orange') {
                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-warning'>
                                    <div class='panel-heading'>" . $n_row['notification_date'] . "
                                       <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "
                                    </div>
                                </div>
                            </div>";
                        } else if ($n_color['color'] == 'green') {
                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-success'>
                                    <div class='panel-heading'>" . $n_row['notification_date'] . "
                                       <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "
                                    </div>
                                </div>
                            </div>";
                        } else if ($n_color['color'] == 'blue') {
                            echo "<div class='col-xs-12 col-md-8 col-md-offset-2'>
                                <div class='panel panel-notif panel-info'>
                                    <div class='panel-heading'>" . $n_row['notification_date'] . "
                                       <a href=\"close_notif.php?nid=$n_row[notification_id]&desc=$n_row[notification]\" title='Close'><i class='fa fa-remove delete-btn x-btn'></i></i></a>
                                    </div>
                                    <div class='panel-body'>
                                        " . $n_row['notification'] . "
                                    </div>
                                </div>
                            </div>";
                        }
                    }
                }
                }else {
                    echo '<div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    You have no notifications.
                    </div>';
                }
                ?>
            </div>
        <?php
        include 'include/scripts.php';
        ?>
</html>