<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Schedules";
    include 'include/head.php';
    include 'connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".appo").click(function() { // Click to only happen on announce links
                $("#appo_id").val($(this).data('id'));
                $("#pat_id").val($(this).data('patient-id'));
                $("#app_id").val($(this).data('a-id'));
                $("#pats_id").val($(this).data('p-id'));
            });
            $('#hideshow').on('click', function() {
                $('#clinics').show();
            });
            $('#showsec').on('click', function() {
                $('#secretary').show();
            });
        });
    </script>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: admin/index.php");
    else if ($account_type != 'Secretary')
        header("location: admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $result = mysqli_query($con, "SELECT * FROM secretary WHERE username LIKE '$username'") or die(mysqli_error());
    $row = mysqli_fetch_array($result);
    $secretary = $row['secretary_name'];
    $secretary_id = $row['secretary_id'];
    $email = $row['email'];

    $doctor_id = $row['doctor_id'];
    $doctor = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $doctor_row = mysqli_fetch_array($doctor);
    $c_result = mysqli_query($con, "SELECT * FROM clinic NATURAL JOIN clinic_sec WHERE secretary_id LIKE '$secretary_id'") or die(mysqli_error());
    $c_row = mysqli_fetch_array($c_result);
    $clinic_id = $c_row['clinic_id'];
    $a_result = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif WHERE doctor_id = '$doctor_id' AND clinic_id = '$clinic_id' AND (appointment_status = 'inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date') ORDER BY 2 ASC, 8 ASC") or die(mysqli_error());
    $sqls = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id <> '$doctor_id' ORDER BY specialization") or die(mysqli_error());

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'") or die(mysqli_error());
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
            include 'include/st-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-asterisk fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-schedules.php">sadsfsd</a></li>
                        <li><a href="st-schedules_tom.php">sdfsdsf</a></li>
                    </ul>
                </li>
                <?php
                include 'include/fd-nav-end.php';
                ?>
                <div class="container-fluid" id="frontdesk-md">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center row-header-black">&mdash; Available Doctors &mdash;</h1>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="panel panel-default doctor-panel">
                                <div class="panel-heading">
                                Dr. Juan Dela Cruz
                                </div>
                                <div class="panel-body">
                                    <p class="clinic-days">Mon/Wed/Fri</p>
                                    <p>2:00 - 4:00</p>
                                    <p>SM Luneta Hill, Baguio City</p>
                                    <p>09123456778</p>
                                </div>
                                <div class="doctor-panel-btns">
                                    <p class="doctor-panel-specs">Cardiology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="panel panel-default doctor-panel">
                                <div class="panel-heading">
                                Dr. Juan Dela Cruz
                                </div>
                                <div class="panel-body">
                                    <p class="clinic-days">Mon/Wed/Fri</p>
                                    <p>2:00 - 4:00</p>
                                    <p>SM Luneta Hill, Baguio City</p>
                                    <p>09123456778</p>
                                </div>
                                <div class="doctor-panel-btns">
                                    <p class="doctor-panel-specs">Cardiology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="panel panel-default doctor-panel">
                                <div class="panel-heading">
                                Dr. Juan Dela Cruz
                                </div>
                                <div class="panel-body">
                                    <p class="clinic-days">Mon/Wed/Fri</p>
                                    <p>2:00 - 4:00</p>
                                    <p>SM Luneta Hill, Baguio City</p>
                                    <p>09123456778</p>
                                </div>
                                <div class="doctor-panel-btns">
                                    <p class="doctor-panel-specs">Cardiology</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="panel panel-default doctor-panel">
                                <div class="panel-heading">
                                Dr. Juan Dela Cruz
                                </div>
                                <div class="panel-body">
                                    <p class="clinic-days">Mon/Wed/Fri</p>
                                    <p>2:00 - 4:00</p>
                                    <p>SM Luneta Hill, Baguio City</p>
                                    <p>09123456778</p>
                                </div>
                                <div class="doctor-panel-btns">
                                    <p class="doctor-panel-specs">Cardiology</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                include 'include/st-edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>