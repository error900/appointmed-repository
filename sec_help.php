<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Help";
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

    $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE doctor_id LIKE '$doctor_id' AND indicator = 'Patient'") or die(mysqli_error());
    $count_row = mysqli_fetch_array($count_result);
    $notif_count = $count_row['count'];
    ?>
    <body class="secretary-bg">
        <div class="container">        
            <?php
            include 'include/st-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-clock-o fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-schedules.php">Today</a></li>
                        <li><a href="st-schedules_tom.php">Tomorrow</a></li>
                        <li><a href="st-schedules_week.php">This Week</a></li>
                        <li><a href="st-schedules_month.php">This Month</a></li>
                        <li><a href="st-schedules_next.php">Next Month</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"></i>History<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="st-completed.php">Finished Schedules</a></li>
                        <li><a href="st-removed.php">Removed Schedules</a></li>
                    </ul>
                </li>
                <?php
                include 'include/st-nav-end.php';
                ?>
                <h2 class="row-header text-center">Help</h2>
                <div class="col-xs-12  col-md-4">
                    <h4>Checking the Doctor's Appointments</h4>
                    <p>The doctor's appointment is categorized  into five (5) namely: today, tommorow, this week, and next month. The secretary will be able to monitor the appointments of the doctor.</p>
                    <p>The secretary can also view the finished appointments, and the appointments that were cancelled appointments.</p>
                </div>
                <div class="col-xs-12  col-md-4">
                    <h4>Exporting the appointment list.</h4>
                    <p>The secretary has also the option to edit their info. The status of the doctor may also be changed int he udpate info option. The secretary may also be set by uplaoding a desired picture, preferably 2x2 in size and in JPG image format.</p>
                </div>
                <div class="col-xs-12  col-md-4">
                    <h4>Secretary Profile</h4>
                    <p>The secretary's profile may be viewed by clicking the "Profile" button under the secretary's name. In the secretary's profile, you can see the infomation about the secretary and the clinics where they are employed.</p>
                    <h4>Changing your pasword</h4>
                    <p>The account password may be changed by clicking "Change Password"  under the secretary's name in the navigation bar.</p>
                </div>
                            
                <?php
                include 'include/remarks-modal.php';
                include 'include/st-edit-profile-modal.php';
                ?>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>