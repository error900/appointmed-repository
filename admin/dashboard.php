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
            <li><a href="change_password.php">Change Password</a></li>
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
                    <h1 class="page-header">Dashboard</h1>
                    <div id="chart_div" style="width: 900px; height: 500px;"></div>


                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/128x128/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Total Number of Doctors</h4>
                            <span class="text-muted">Date of last modified</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Total Number of Patients</h4>
                            <span class="text-muted">Date of last modified</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Total Number of Active Users</h4>
                            <span class="text-muted">Date of last modified</span>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img data-src="holder.js/128x128/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
                            <h4>Total Number of Inactive Users</h4>
                            <span class="text-muted">Date of last modified</span>
                        </div>
                    </div>

                    <h2 class="sub-header">Users List</h2>
                    <?php 
                        include 'include/database-table.php';
                    ?>
                </div>
            </div>
        </div>

        <?php
        include 'include/scrolltop.php';
        include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/googlejsapi.js"></script>
        <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php 
                  $stringResult;
                  $i = 0;
                  $sql = "SELECT patient_id FROM patient";
                  $results1 = $this->db->query($sql);
                  //for($i=0; $i<10; ++$i)
                  {
                  $stringResult .= "data[" .$i. "] = { label:" .$results['name'].", data: ". $results['quantity'] ."}";
                   $i++;
                 // foreach($data as $v){
                   // echo ",['{$name}'],{$count}]\r\n";
                    return $stringResult;
                  }
              ?>
            ]);
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Doctors',     11],
                ['Patients',      2],
                ['Commute',  2],
                ['Watch TV', 2],
                ['Sleep',    7]
            ]);
            var options = {
              title: 'My Daily Activities'
            };
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
    </body>
</html>