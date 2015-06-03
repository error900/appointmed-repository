<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Front Desk | Available Doctors";
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
        $sql = mysqli_query($con, "SELECT * FROM clinic_schedule natural join clinic WHERE clinic_name='Benguet Laboratories'");
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
                                $count_app = mysqli_query($con, "SELECT * FROM appointment where clinic_id like '$clinic_id' AND appoint_date LIKE CURDATE() AND appointment_status = 'Inqueue'");
                                $count_a= mysqli_num_rows($count_app);
                                $count_walk_in = mysqli_query($con, "SELECT * FROM walk_in where clinic_id like '$clinic_id' AND appointW_date LIKE CURDATE() AND appointmentW_status = 'Inqueue'");
                                $count_w = mysqli_num_rows($count_walk_in);
                                $total_count = $count_a + $count_w;
                                $check_day = date('D', strtotime($date));
                                $days = $row['days'];
                                $days = explode('/', $days);
                                foreach($days as $value){
                                    $val = (ucfirst(strtolower($value)));
                                    array_push($days, $val);
                                }
                                if(in_array($check_day, $days)){
                                    $doctor_id = $row['doctor_id'];
                                    $doctor = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor_id'");
                                    $doctor_rows = mysqli_fetch_array($doctor);
                                    //echo $doctor_rows['doctor_name'].'<br>';
                            echo "<a href=\"inqueue-details.php?did=$doctor_id&cid=$clinic_id\">";
                            echo '      <div class="col-xs-12 col-md-3">
                                        <div class="panel panel-default doctor-panel">
                                        <div class="panel-heading">
                                        Dr. '. $doctor_rows["doctor_name"];                
                                    ?>

                                    <div class="doctor-panel-photo">
                                        <img class="img-responsive" src="img/profile/<?php
                                        $file = "img/profile/" . $doctor_id . ".jpg";
                                        if (file_exists($file)) {
                                            echo $doctor_id;
                                        } else {
                                            echo 'profile';
                                        }
                                        ?>.jpg">
                                    </div>

                                <?php
                                echo '</div>
                                        <div class="panel-body">
                                        <p class="clinic-days">'.$row['days'].'</p>
                                        <p class="clinic-times">'.$row['time'].'</p>
                                        <p class="clinic-inqueue">Total patients in queue: <span>' . $total_count . '</span></p>
                                        </div>
                                        <div>
                                        </div>
                                        </a>
                                        <div class="doctor-panel-btns">
                                                
                                        <button type="button" class="btn btn-default btn-inverse walk btn-noborder tooltip-bottom" data-tooltip="Add to queue" data-toggle="modal" data-target=".bs-add-modal-sm" data-doc-id="'.$doctor_id.'" data-cli-id="'.$clinic_id.'">add patient</button>
                                        <p class="doctor-panel-specs">'.$doctor_rows['specialization'].'</p>
                                       </div>
                                    </div>
                                </div>';
                                }
               
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