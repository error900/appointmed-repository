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
    $date = date('Y-m-d');

    $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);
    $sql = mysqli_query($con, "SELECT * FROM account WHERE (('$date' - last_logged_in) >5) AND account_type = 'Patient' ");
    $row = mysqli_fetch_array($sql);
    ?>
    <body class="e4e8e9-bg">
        <?php
        include 'include/admin-nav-start.php';
        ?>
        <ul class="dropdown-menu" role="menu">
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="help.php">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i> logout</a></li>
        </ul>
        <?php
        include 'include/admin-nav-end.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
            </div>
        </div>
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Users who are inactive (those who have not used the system for 6 months)
            </h1>
            <div class="table-responsive database">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Account Type</th>
                        <th><input type="checkbox" value="Check All" id="checkallA" onClick="checkAll(form1)"></th>
                    </tr>
                </thead>
                <form method="post" action="removal.php" id="form1">
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                        $username = $row['username'];
                        $result = mysqli_query($con, "SELECT patient_id, patient_name FROM patient WHERE username LIKE '$username' 
                            UNION (SELECT doctor_id, doctor_name FROM doctor WHERE username LIKE '$username') 
                            UNION (SELECT secretary_id, secretary_name FROM secretary WHERE username LIKE '$username')");
                        $account = mysqli_fetch_array($result);
                        echo '<tr>';
                        echo '<td>' . $account['patient_id'] . '</td>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $account['patient_name'] . '</td>';
                        echo '<td>' . $row['account_type'] . '</td>';
                        echo "<td><input type='checkbox' name='select[]' id='select' value='$row[username]'></td>";
                        echo '</tr>';
                    }
                    echo '<input type="submit" class="btn btn-default red-btn h1-btn" name="submit" value="Notify">';
                    ?>
                </form>
            </table>
        </div>
        <?php
        include 'include/scrolltop.php';
        include 'include/scripts.php';
        ?>
    </body>
</html>