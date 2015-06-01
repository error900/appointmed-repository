<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Front Desk | Available Doctors";
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
    if(isset($_GET['page'])){
         $page = (int)mysqli_real_escape_string($con, $_GET['page']);
    }else{
        $page =0;
    }
    if($page=="" || $page=="1"){
        $page1 = 0;
    }else{
        $page1 = ($page*8)-8;
    }
    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    if(is_int($page1)){
        $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule natural join clinic WHERE doctor_status = 'In' AND clinic_name='Benguet Laboratories' ORDER BY 3 LIMIT $page1,8");
    }else{
        echo "<script> alert('Woops you seem lost, let me help you'); </script>";
        echo "<script> location.replace('index.php') </script>";
    }
    $count_sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule natural join clinic WHERE doctor_status = 'In' AND clinic_name='Benguet Laboratories' ORDER BY 3 ");
    $count = mysqli_num_rows($count_sql);
    $cout = ceil($count/8);

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
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center row-header-black">&mdash; Available Doctors &mdash;</h1>
                        </div>
                        <?php
                            while($row = mysqli_fetch_array($sql)){
                                $doctor_id = $row['doctor_id'];
                                $clinic_id = $row['clinic_id'];
                                $date = date('Y-m-d', strtotime($date));
                                $available_days = explode("/", $row['days']);
                                $count_app = mysqli_query($con, "SELECT * FROM appointment where clinic_id like '$clinic_id' AND appoint_date LIKE CURDATE()");
                                $count_a= mysqli_num_rows($count_app);
                                $count_walk_in = mysqli_query($con, "SELECT * FROM walk_in where clinic_id like '$clinic_id' AND appointW_date LIKE CURDATE()");
                                $count_w = mysqli_num_rows($count_walk_in);

                                $total_count = $count_a + $count_w;
                                
                            echo '<div class="col-xs-12 col-md-3">';
                                echo '<div class="panel panel-default doctor-panel">';
                                    echo '<div class="panel-heading">';
                                        echo $row['doctor_name'];?>
                                        <img class="img-responsive" src="img/profile/<?php
                                        $file = "img/profile/" . $doctor_id . ".jpg";
                                        if (file_exists($file)) {
                                            echo $doctor_id;
                                        } else {
                                            echo 'profile';
                                        }
                                        ?>.jpg">
                            <?php
                                    echo '</div>';
                                    echo '<div class="panel-body">';
                                        echo '<p class="clinic-days">'.$row['days'].'</p>';
                                        echo '<p class="clinic-info">'.$row['time'].'</p>';
                                        echo '<p class="clinic-inqueue">Total patients in queue: <span>' . $total_count . '</span></p>';
                                    echo '</div>';
                                    echo '<div>';
                                    echo '</div>';
                                    echo '<div class="doctor-panel-btns">';
                                            echo "<a href=\"walk_in.php?did=$doctor_id&cid=$clinic_id\" class='tooltip-bottom' data-tooltip='Add to queue' onclick='return confirm(\"Add patient to queue?\")'><i class=\"fa fa-plus\"></i></a>";
                                            echo '<p class="doctor-panel-specs">'.$row['specialization'].'</p>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                            }
                        ?>
                        <div class="col-xs-12 col-md-6 col-md-offset-3">
                            <nav class="text-center">
                                <ul class="pagination">
                                    <?php 
                                        for($i=1; $i<=$cout; $i++) {
                                            echo "<li><a href=\"index.php?page=".$i."\" id='num-page'>" .$i. "</a></li>";
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <?php 
                include 'include/add_to_queue.php';
                ?>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>