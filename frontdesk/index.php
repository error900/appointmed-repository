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
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor");

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
                        <?php
                            while($row = mysqli_fetch_array($sql)){
                                echo '<div class="col-xs-12 col-md-3">';
                                    echo '<div class="panel panel-default doctor-panel">';
                                        echo '<div class="panel-heading">';
                                        echo $row['doctor_name'];
                                        echo '</div>';
                                        echo '<div class="panel-body">';
                                            echo '<p class="clinic-days"></p>';
                                            echo '<p class="clinic-info">2:00 - 4:00</p>
                                            <p class="clinic-info">SM Luneta Hill, Baguio City</p>
                                            <p class="clinic-info">09123456778</p>';
                                        echo '</div>';
                                        echo '<div class="doctor-panel-btns">';
                                            echo '<p class="doctor-panel-specs">Cardiology</p>';
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div>
    </body>
</html>