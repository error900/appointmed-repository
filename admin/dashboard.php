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

    $account_sql = mysqli_query($con, "SELECT * FROM account WHERE username <> 'Admin' ");
    //    $account_row = mysqli_fetch_array($account_sql);

    // Pie Chart Data
    $count_doctor_result = mysqli_query($con, "SELECT COUNT(account_type) AS doctor FROM `account` WHERE account_type like 'doctor'");
    $doctor_row = mysqli_fetch_array($count_doctor_result);
    $doctors = $doctor_row['doctor'];
    $count_patient_result = mysqli_query($con, "SELECT COUNT(account_type) AS patient FROM `account` WHERE account_type like 'patient'");
    $patient_row = mysqli_fetch_array($count_patient_result);
    $patients = $patient_row['patient'];
    $count_active_result = mysqli_query($con, "SELECT COUNT(account_status) AS active FROM `account` WHERE account_status like 'active'");
    $active_row = mysqli_fetch_array($count_active_result);
    $active_user = $active_row['active'];
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
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>

                    <div class="row placeholders">
                        <div class="col-xs-12 col-sm-3 placeholder">
                            <div id="canvas-holder">
                                <canvas id="chart-area1"/>
                            </div>
                            <h4>Current Data</h4>
                            <span class="text-muted">Date of last modified</span>
                        </div>
                        <div class="col-xs-12 col-sm-3 placeholder">

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
        <script type="text/javascript" src="js/chart.js"></script>
        <script>
            var doctorPatientPopulation = [
                <?php
                    

                        echo '{';
                            echo 'value: ' . $doctors . ',';
                            echo 'color: "#F7464A",';
                            echo 'highlight: "#FF5A5E",';
                            echo 'label: "Doctors"';
                        echo '},';
                        echo '{';
                            echo 'value: ' . $patients . ',';
                            echo 'color: "#46BFBD",';
                            echo 'highlight: "#5AD3D1",';
                            echo 'label: "Patient"';
                        echo '},';
                        echo '{';
                            echo 'value: ' . $active_user . ',';
                            echo 'color: "#FDB45C",';
                            echo 'highlight: "#FFC870",';
                            echo 'label: "Active Users"';
                        echo '},';
                        echo '{';
                            echo 'value: 2,';
                            echo 'color: "#949FB1",';
                            echo 'highlight: "#A8B3C5",';
                            echo 'label: "Doctors"';
                        echo '},';
                        echo '{';
                            echo 'value: 2,';
                            echo 'color: "#4D5360",';
                            echo 'highlight: "#616774",';
                            echo 'label: "Doctors"';
                        echo '}';
                    ?>

                ];

                window.onload = function(){
                    var ctx = document.getElementById("chart-area1").getContext("2d");
                    window.myDoughnut = new Chart(ctx).Doughnut(doctorPatientPopulation, {responsive : true});
                };

    </script>
    </body>
</html>