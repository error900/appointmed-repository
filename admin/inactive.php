<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Inactive Users";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>
    <script type="text/javascript">
        checked = false;
        function checkAll(form1) {
            var aa = document.getElementById('form1');
            if (checked == false) {
                checked = true
            } else {
                checked = false
            }
            for (var i = 0; i < aa.elements.length; i++) {
                aa.elements[i].checked = checked;
            }
        }
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");
    $date = date('Y-m-d');

    $sql = mysqli_query($con, "SELECT * FROM account WHERE account_type = 'Patient' ");
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
            <h1 class="page-header">Users who are inactive for 1 or more years
            </h1>
            <div class="table-responsive database">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Last Logged In</th>
                        <th><input type="checkbox" value="Check All" id="checkallA" onClick="checkAll(form1)"></th>
                    </tr>
                </thead>
                <form method="post" action="inactive_users.php" id="form1">
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                        $last = explode('-',$row['last_logged_in']);
                        $diff = (date("md", 
                        date("U", mktime(0, 0, 0, $last[1], $last[2], $last[0]))) > date("md") ? ((date("Y") - $last[0]) - 1) : (date("Y") - $last[0]));
                        if($diff >= 1 && ($last[0]!=0000)){
                            $username = $row['username'];
                            $result = mysqli_query($con, "SELECT patient_id, patient_name FROM patient WHERE username LIKE '$username' ");
                            $account = mysqli_fetch_array($result);
                            echo '<tr>';
                            echo '<td>' . $account['patient_id'] . '</td>';
                            echo '<input type="hidden" value="'.$account['patient_id'].'" name="patient_id">';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td>' . $account['patient_name'] . '</td>';
                            echo '<td>' . $row['last_logged_in'] . '</td>';
                            echo "<td><input type='checkbox' name='select[]' id='select' value='$row[username]'></td>";
                            echo '</tr>';
                        }
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