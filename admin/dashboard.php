<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Dashboard";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>
    <script type="text/javascript" src="js/sorttable.js"></script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");
    $account_sql = mysqli_query($con, "SELECT * FROM account WHERE username <> 'Admin' AND username <> 'Frontdesk' ");

    ?>
    <?php include 'include/table_data.php';?>

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

                    <div class="row placeholders hidden-xs hidden-sm">
                        <div class="col-xs-12 col-sm-12 placeholder">
                            <div class="bar-graph">
                                <canvas id="canvasbar" height="120"></canvas>
                            </div>
                            <h4>Specialization</h4>
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
<!--         SELECT specialization, COUNT( specialization ) 
        FROM  `doctor` 
        WHERE 1 
        GROUP BY specialization
        LIMIT 0 , 30 -->
        <script>

        var barChartData = {
            labels : ["CARDIOLOGY","CFP/PCOM","CONSTRUCTIVE SURGERY","DERMATOLOGY","ENDOCRINOLOGY","ENT","EPIDEMIOLOGY", "FM/GP/IM", "FM/GP/PCOM", "GASTROENTEROLOGY", "GP", "GP/ANIMAL BITE", "INFECTIOUS DISEASE", "INTERNAL MEDICINE", "NEPHROLOGY", "NEURO-PSYCHIATRY", "NEUROLOGY", "OB GYNE", "ONCOLOGY", "OPTHALMOLOGY", "ORTHOPEDICS", "ORTHOPEDICS/GP", "PEDIATRICIAN", "PSYCHOLOGY", "PULMUNOLOGY", "SURGERY", "UROLOGY", "UTZ"],
            datasets : [
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,0.8)",
                    highlightFill : "rgba(151,187,205,0.75)",
                    highlightStroke : "rgba(151,187,205,1)",
                    data : [<?php echo $cardiology?>,<?php echo $cfp?>,<?php echo $cons?>,<?php echo $derm?>,<?php echo $endo?>,<?php echo $ent?>,<?php echo $epi?>,<?php echo $im?>,<?php echo $pcom?>,<?php echo $gastro?>,<?php echo $gp?>,<?php echo $bite?>,<?php echo $infec?>,<?php echo $inter?>,<?php echo $neph?>,<?php echo $neurop?>,<?php echo $neuro?>,<?php echo $ob?>,<?php echo $onco?>,<?php echo $opth?>,<?php echo $ortho?>,<?php echo $orthogp?>,<?php echo $pedia?>,<?php echo $psych?>,<?php echo $pulmo?>,<?php echo $surg?>,<?php echo $uro?>,<?php echo $utz?>]
                }
            ]
        }
        window.onload = function(){
            var ctxbar = document.getElementById("canvasbar").getContext("2d");
            window.myBar = new Chart(ctxbar).Bar(barChartData, {
                responsive : true
            });
        }
        </script>

    </body>
</html>