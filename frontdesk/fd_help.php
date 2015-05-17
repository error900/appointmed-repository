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
    // $loggedIn = $_SESSION['loggedIn'];
    // $account_type = $_SESSION['account_type'];
    // if ($loggedIn == false)
    //     header("location: ../admin/index.php");
    // else if ($account_type != 'FrontDesk')
    //     header("location: ../admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY doctor_name");

    ?>
    <body class="e4e8e9-bg">
        <div class="container">        
            <?php
             include 'include/fd-nav-start.php';
            ?>
            <ul class="nav navbar-nav">
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-asterisk fa-lg"></i>Schedules <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php">sadsfsd</a></li>
                        <li><a href="">sdfsdsf</a></li>
                    </ul>
                </li>
                <?php
                include 'include/fd-nav-end.php';
                ?>
                <div class="row">
                    <h2 class="row-header text-center">Help</h2>
                </div>
                <script type="text/javascript" src="js/scrolltop.js"></script>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>