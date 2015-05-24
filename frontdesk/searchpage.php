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
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_name LIKE '%$search%' or specialization LIKE '%$search%' ORDER BY doctor_name");

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
                                            $doctor_name = $row['doctor_name'];
                                            $specialization = $row['specialization'];
                                            $doctor_status = $row['doctor_status'];
                                            $c_username = $search;
                                            $b_username = $c_username;
                                            $final_name = str_ireplace($search, $b_username, $doctor_name);
                                            $final_specs = str_ireplace($search, $b_username, $specialization);
                                            echo "<a href=\"doctor.php?id=$doctor_id\">";
                                    ?>
                                    <div class="col-xs-12 col-md-4 search-doctor-result">
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
                                        </div>
                                    </div>
                                        <?php 
                                        echo '</a>';
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