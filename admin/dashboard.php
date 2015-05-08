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
    // $count_doctor_result = mysqli_query($con, "SELECT COUNT(account_type) AS doctor FROM `account` WHERE account_type like 'doctor'");
    // $count_patient_result = mysqli_query($con, "SELECT COUNT(account_type) AS patient FROM `account` WHERE account_type like 'patient'");
    // $count_active_result = mysqli_query($con, "SELECT COUNT(account_status) AS active FROM `account` WHERE account_status like 'active'");
    // Specialization
    $count_cardiology_result = mysqli_query($con, "SELECT COUNT(specialization) AS cardiology FROM `doctor` WHERE specialization LIKE 'Cardiology'");
    $count_cfp_result = mysqli_query($con, "SELECT COUNT(specialization) AS cfp FROM `doctor` WHERE specialization LIKE 'CFP/PCOM'");
    $count_cons_result = mysqli_query($con, "SELECT COUNT(specialization) AS cons FROM `doctor` WHERE specialization LIKE 'Constructive Surgery'");
    $count_derm_result = mysqli_query($con, "SELECT COUNT(specialization) AS derm FROM `doctor` WHERE specialization LIKE 'Dermatology'");
    $count_endo_result = mysqli_query($con, "SELECT COUNT(specialization) AS endo FROM `doctor` WHERE specialization LIKE 'Endocrinology'");
    $count_ent_result = mysqli_query($con, "SELECT COUNT(specialization) AS ent FROM `doctor` WHERE specialization LIKE 'ENT'");
    $count_epi_result = mysqli_query($con, "SELECT COUNT(specialization) AS epi FROM `doctor` WHERE specialization LIKE 'EPIDEMIOLOGY'");
    $count_im_result = mysqli_query($con, "SELECT COUNT(specialization) AS im FROM `doctor` WHERE specialization LIKE 'FM/GP/IM'");
    $count_pcom_result = mysqli_query($con, "SELECT COUNT(specialization) AS pcom FROM `doctor` WHERE specialization LIKE 'FM/GP/PCOM'");
    $count_gastro_result = mysqli_query($con, "SELECT COUNT(specialization) AS gastro FROM `doctor` WHERE specialization LIKE 'Gastroenterology'");
    $count_gp_result = mysqli_query($con, "SELECT COUNT(specialization) AS gp FROM `doctor` WHERE specialization LIKE 'GP'");
    $count_bite_result = mysqli_query($con, "SELECT COUNT(specialization) AS bite FROM `doctor` WHERE specialization LIKE 'GP/Animal Bite'");
    $count_infec_result = mysqli_query($con, "SELECT COUNT(specialization) AS infec FROM `doctor` WHERE specialization LIKE 'Infectious Disease'");
    $count_inter_result = mysqli_query($con, "SELECT COUNT(specialization) AS inter FROM `doctor` WHERE specialization LIKE 'Internal Medicine'");
    $count_neph_result = mysqli_query($con, "SELECT COUNT(specialization) AS neph FROM `doctor` WHERE specialization LIKE 'Nephrology'");
    $count_neurop_result = mysqli_query($con, "SELECT COUNT(specialization) AS neurop FROM `doctor` WHERE specialization LIKE 'Neuro-Psychiatry'");
    $count_neuro_result = mysqli_query($con, "SELECT COUNT(specialization) AS neuro FROM `doctor` WHERE specialization LIKE 'Neurology'");
    $count_ob_result = mysqli_query($con, "SELECT COUNT(specialization) AS ob FROM `doctor` WHERE specialization LIKE 'OB Gyne'");
    $count_onco_result = mysqli_query($con, "SELECT COUNT(specialization) AS onco FROM `doctor` WHERE specialization LIKE 'Oncology'");
    $count_opth_result = mysqli_query($con, "SELECT COUNT(specialization) AS opth FROM `doctor` WHERE specialization LIKE 'Opthalmology'");
    $count_ortho_result = mysqli_query($con, "SELECT COUNT(specialization) AS ortho FROM `doctor` WHERE specialization LIKE 'Orthopedics'");
    $count_orthogp_result = mysqli_query($con, "SELECT COUNT(specialization) AS orthogp FROM `doctor` WHERE specialization LIKE 'Orthopedics/GP'");
    $count_pedia_result = mysqli_query($con, "SELECT COUNT(specialization) AS pedia FROM `doctor` WHERE specialization LIKE 'Pediatrician'");
    $count_psych_result = mysqli_query($con, "SELECT COUNT(specialization) AS psych FROM `doctor` WHERE specialization LIKE 'Psychology'");
    $count_pulmo_result = mysqli_query($con, "SELECT COUNT(specialization) AS pulmo FROM `doctor` WHERE specialization LIKE 'Pulmunology'");
    $count_surg_result = mysqli_query($con, "SELECT COUNT(specialization) AS surg FROM `doctor` WHERE specialization LIKE 'Surgery'");
    $count_uro_result = mysqli_query($con, "SELECT COUNT(specialization) AS uro FROM `doctor` WHERE specialization LIKE 'Urology'");
    $count_utz_result = mysqli_query($con, "SELECT COUNT(specialization) AS utz FROM `doctor` WHERE specialization LIKE 'UTZ'");
    
    // $doctor_row = mysqli_fetch_array($count_doctor_result);
    // $patient_row = mysqli_fetch_array($count_patient_result);
    // $active_row = mysqli_fetch_array($count_active_result);
    
    // Specialization
    $cardiology_row = mysqli_fetch_array($count_cardiology_result);
    $cfp_row = mysqli_fetch_array($count_cfp_result);
    $cons_row = mysqli_fetch_array($count_cons_result);
    $derm_row = mysqli_fetch_array($count_derm_result);
    $endo_row = mysqli_fetch_array($count_endo_result);
    $ent_row = mysqli_fetch_array($count_ent_result);
    $epi_row = mysqli_fetch_array($count_epi_result);   
    $im_row = mysqli_fetch_array($count_im_result);
    $pcom_row = mysqli_fetch_array($count_pcom_result);
    $gastro_row = mysqli_fetch_array($count_gastro_result);
    $gp_row = mysqli_fetch_array($count_gp_result);
    $bite_row = mysqli_fetch_array($count_bite_result);
    $infec_row = mysqli_fetch_array($count_infec_result);
    $inter_row = mysqli_fetch_array($count_inter_result);
    $neph_row = mysqli_fetch_array($count_neph_result);
    $neurop_row = mysqli_fetch_array($count_neurop_result);
    $neuro_row = mysqli_fetch_array($count_neuro_result);
    $ob_row = mysqli_fetch_array($count_ob_result);
    $onco_row = mysqli_fetch_array($count_onco_result);
    $opth_row = mysqli_fetch_array($count_opth_result);
    $ortho_row = mysqli_fetch_array($count_ortho_result);
    $orthogp_row = mysqli_fetch_array($count_orthogp_result);
    $pedia_row = mysqli_fetch_array($count_pedia_result);
    $psych_row = mysqli_fetch_array($count_psych_result);
    $pulmo_row = mysqli_fetch_array($count_pulmo_result);
    $surg_row = mysqli_fetch_array($count_surg_result);
    $uro_row = mysqli_fetch_array($count_uro_result);
    $utz_row = mysqli_fetch_array($count_utz_result);

    // $doctors = $doctor_row['doctor'];
    // $patients = $patient_row['patient'];
    // $active_user = $active_row['active'];

    $cardiology = $cardiology_row['cardiology'];
    $cfp = $cfp_row['cfp'];
    $cons = $cons_row['cons'];
    $derm = $derm_row['derm'];
    $endo = $endo_row['endo'];
    $ent = $ent_row['ent'];
    $epi = $epi_row['epi'];
    $im = $im_row['im'];
    $pcom = $pcom_row['pcom'];
    $gastro = $gastro_row['gastro'];
    $gp = $gp_row['gp'];
    $bite = $bite_row['bite'];
    $infec = $infec_row['infec'];
    $inter = $inter_row['inter'];
    $neph = $neph_row['neph'];
    $neurop = $neurop_row['neurop'];
    $neuro = $neuro_row['neuro'];
    $ob = $ob_row['ob'];
    $onco = $onco_row['onco'];
    $opth = $opth_row['opth'];
    $ortho = $ortho_row['ortho'];
    $orthogp = $orthogp_row['orthogp'];
    $pedia = $pedia_row['pedia'];
    $psych = $psych_row['psych'];
    $pulmo = $pulmo_row['pulmo'];
    $surg = $surg_row['surg'];
    $uro = $uro_row['uro'];
    $utz = $utz_row['utz'];
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
        // var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

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
    </body>
</html>