<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Front Desk | Inqueue Details";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".walk").click(function() {
                $("#doc_id").val($(this).data('doc-id'));
                $("#cli_id").val($(this).data('cli-id'));
            });
        });
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");
    $username = $_SESSION['username'];
    if(isset($_GET['did']) && isset($_GET['cid'])){
        $doctor_id = mysqli_real_escape_string($con, $_GET['did']);
        $clinic_id = mysqli_real_escape_string($con, $_GET['cid']);
    }else
        header("location: index.php");
    $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_id LIKE '$doctor_id'");
    $doctor = mysqli_fetch_array($sql);
    $appoints = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif WHERE doctor_id LIKE '$doctor_id' AND appointment_status = 'Inqueue' AND appoint_date LIKE CURDATE()");

    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
             include 'include/fd-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="tooltip-bottom" data-tooltip="Online Doctors">
                    <a href="index.php"><i class="fa fa-users fa-lg"></i>On Deck</a>
                </li>
                <li class="nav-button navbar-right">
                    <?php echo '<button type="button" class="btn btn-default btn-inverse walk btn-noborder red-btn" data-toggle="modal" data-target=".bs-add-modal-sm" data-doc-id="'.$doctor_id.'" data-cli-id="'.$clinic_id.'"><i class="fa fa-plus"></i>Add Walk-in Patient</button>';
                    ?>
                </li>
            <?php
            include 'include/fd-nav-end.php';
            ?>
                <div class="container-fluid" id="frontdesk-md">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center row-header-black">&mdash; Patients Inqueue &mdash;</h1>
                        </div>
                        <div class="col-xs-12 col-md-2 col-md-offset-2 doctor-photo hidden-xs hidden-sm">
                            <img class="img-responsive" src="img/profile/profile.jpg">
                        </div>
                        <div class="col-xs-12 col-md-5 user-md">
                            <div class="d-info">
                                    <h1>Dr. <?php echo $doctor['doctor_name']?></h1>
                                    <p class="clinic-days"><?php echo $doctor['days']?></p>
                                    <p class="clinic-times"><?php echo $doctor['time']?></p>
                                    <p class="clinic-times"><?php echo $doctor['doctor_status']?></p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-2">
                            <?php
                            if($doctor['doctor_status'] == 'Out' || $doctor['doctor_status'] == 'Break'){
                                echo '<form action="online.php" method="post">
                                    <input type="hidden" name="doctor" value="'.$doctor_id.'">
                                    <input type="hidden" name="clinic" value="'.$clinic_id.'">
                                    <input type="hidden" name="doctor_status" value="In">
                                    <input type="submit" class="btn btn-default red-btn btn-noborder" name="" value="Put Online">
                                </form>';
                            } else if ($doctor['doctor_status'] == 'In' || $doctor['doctor_status'] == 'Break') {
                                echo '<form action="offline.php" method="post">
                                    <input type="hidden" name="doctor" value="'.$doctor_id.'">
                                    <input type="hidden" name="clinic" value="'.$clinic_id.'">
                                    <input type="hidden" name="doctor_status" value="Out">
                                    <input type="submit" class="btn btn-default red-btn btn-noborder" name="" value="Put Offline">
                                </form>';
                            }
                            ?>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <h2 class="row-header-lc">Total Patients: ##</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                        $walks = mysqli_query($con, "SELECT * FROM walk_in WHERE clinic_id LIKE '$clinic_id' AND appointW_date LIKE CURDATE() AND appointmentW_status LIKE 'Inqueue'");
                        if (mysqli_num_rows($appoints) >= 1 || mysqli_num_rows($walks)>= 1) {
                            while($appoint = mysqli_fetch_array($appoints)){
                                $appointment_id = $appoint['appointment_id'];
                                $queue_id = $appoint['queue_id'];
                                $patient_id = $appoint['patient_id'];
                                $p_sql = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient_id'");
                                $p_result = mysqli_fetch_array($p_sql);
                                echo '<div class="col-xs-12 col-md-3">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">';
                                    echo ' <h4 class="list-group-item-heading">'.$p_result['patient_name'].'</h4>';
                                    echo ' <p class="list-group-item-text">Online</p>';
                                    echo ' <p class="list-group-item-text">Queue # '.$appoint['queue_id'].'</p>';
                                    echo "<a href=\"close.php?id=$appointment_id&doc=$doctor_id&pat=$patient_id&cid=$clinic_id&qid=$queue_id\" class=\"list-group-item\">cancel<i class=\"fa fa-times\"></i></a>";
                                echo    '</a>
                                    </div>
                                </div>';
                            }
                            while($walkin = mysqli_fetch_array($walks)){
                                echo '<div class="col-xs-12 col-md-3">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">';
                                    echo ' <h4 class="list-group-item-heading">'.$walkin['walk_in_name'].'</h4>';
                                    echo ' <p class="list-group-item-text">Walk In</p>';
                                    echo ' <p class="list-group-item-text">Queue # '.$walkin['walk_in_id'].'</p>';
                                    echo  "<a href=\"close_walk_in.php?doc=$doctor_id&cid=$clinic_id&wid=$walkin[walk_in]\" class=\"list-group-item\">cancel<i class=\"fa fa-times\"></i></a>";
                                echo    '</a>
                                    </div>
                                </div>';
                            }
                        }else {
                            echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
                                <div class="alert alert-warning" role="alert">
                                <strong>There are no appointments inqueue.</strong></div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <?php 
                include 'include/add_to_queue.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>