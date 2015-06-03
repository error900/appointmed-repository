<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Search Results";
    include 'include/head.php';
    include '../connectdatabase.php';
    include 'include/scripts.php';
    include 'include/scrolltop.php';
    ?>
    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: ../admin/index.php");
    else if ($account_type != 'FrontDesk')
        header("location: ../admin/index.php");
    $search = mysqli_real_escape_string($con, $_GET['q']);

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor");
    $result = mysqli_query($con, "SELECT * FROM doctor natural join clinic_schedule WHERE doctor_name LIKE '%$search%' or specialization LIKE '%$search%' AND doctor_status = 'IN' ORDER BY 2 ");

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
            <?php
            include 'include/fd-nav-end.php';
            ?>
                <div class="container-fluid" id="frontdesk-md">
                    <div class="row">
                        <div class="col-md-12 search-link">
                            <h1 class="text-center row-header-black">&mdash; Results &mdash;</h1>
                                <?php
                                    if (mysqli_num_rows($result) >= 1) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $doctor_id = $row['doctor_id'];
                                            $clinic_id = $row['clinic_id'];
                                            $doctor_name = $row['doctor_name'];
                                            $specialization = $row['specialization'];
                                            $doctor_status = $row['doctor_status'];
                                            $c_username = $search;
                                            $b_username = $c_username;
                                            $final_name = str_ireplace($search, $b_username, $doctor_name);
                                            $final_specs = str_ireplace($search, $b_username, $specialization);
                                            echo "<a href=\"inqueue-details.php?did=$doctor_id&cid=$clinic_id\">";
                                    ?>

                                    <div class="col-xs-12 col-md-4 search-doctor-result frontdesk">
                                        <img class="img-responsive" src="img/profile/<?php
                                        $file = "img/profile/" . $doctor_id . ".jpg";
                                        if (file_exists($file)) {
                                        echo $doctor_id;
                                        } else {
                                        echo 'profile';
                                        }
                                        ?>.jpg">
                                        <div class="search-doctor-info">
                                            <p><i class='fa fa-user-md'></i>Dr. <?php echo $final_name ?></p>
                                            <p class="search-specs"><?php echo $final_specs ?></p>
                                            <?php
                                            echo "</a>";
                                            // echo "<a href=\"walk_in.php?did=$doctor_id&cid=$clinic_id\" class='addToQueueBtn tooltip-bottom' data-tooltip='Add to queue' onclick='\return confirm(\"Add patient to queue?\")\'><i class='fa fa-plus'></i></a>";
                                            ?>
                                        </div>
                                    </div>
                                        <?php 
                                        } 
                                        ?>
                                    <?php
                                    } else {
                                        echo '<div class="col-xs-12 col-md-4 col-md-offset-4">
                                        <div class="alert alert-warning" role="alert">
                                        <strong>No matches found.</strong> Try another search.</div>
                                        </div>';
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
                <?php
                include 'include/scrolltop.php';
                ?>  
                <script type="text/javascript" src="js/search.js"></script>
                <script type="text/javascript" src="js/scrolltop.js"></script>
        </div> <!-- /container -->
    </body>
</html>