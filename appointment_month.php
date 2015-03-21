<!DOCTYPE html>
<html lang="en">
    <style>
#divResult
        {
            position:absolute;
            width:210px;
            display:none;
            margin-top:40px;
            border:solid 1px #dedede;
            border-top:0px;
            overflow:hidden;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
            -moz-border-bottom-right-radius: 6px;
            -moz-border-bottom-left-radius: 6px;
            border-width: 3px 1px 1px;
            border-color: #333 #DEDEDE #DEDEDE;
            background-color: white;
        }
        .display_box
        {
            padding:4px; border-top:solid 1px #dedede; 
            font-size:12px;
        
        }
        .display_box:hover
        {
            background:#3bb998;
            color:#FFFFFF;
            cursor:pointer;
        }
        a
        {
            text-decoration: none;
 
            background: #3bb998;
            color:#FFFFFF;
            cursor: pointer;
        }
    </style>

    <?php
        $title = "Appointments";
        include 'include/head.php';
        include 'connectdatabase.php';
        //include 'include/scripts.php';
        //include 'include/scrolltop.php';
    ?>
    
     <script type="text/javascript">
     $(document).ready(function(){
           $(".appo").click(function(){
             $("#appo_id").val($(this).data('id'));
             $("#doc_id").val($(this).data('doctor-id'));
           });
     });
    </script>
  <body>
    <div class="container">
        <?php 
            session_start();
            if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type']) && isset($_SESSION['username'])){
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                $username = $_SESSION['username'];
                $start = date("Y-m-1");
                $end = date("Y-m-t");


                if($loggedIn == false)
                    header("location: index.php");
                else if($account_type != 'Patient')
                    header("location: index.php");   
            }else{
                header("location: index.php");
                die();
            }
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $row =  mysqli_fetch_array($result);
            $patient = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND (appoint_date >= '$start' AND appoint_date <= '$end')" );
        
            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient' AND indicator = 'doctor'" );
            $count_row = mysqli_fetch_array($count_result);
            $notif_count =  $count_row['count'];
        ?>
        <!-- navigation -->
        <?php 
            include 'include/pt-nav-start.php';
        ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="#">This Month</a></li>
                            </ul>
                        </li>
                        <li><a href="notifications.php">Notifications <span class="badge"><?php echo $notif_count?></span></a></li>
                        <li><a href="history.php">History</a></li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>     
        <!-- /navigation -->           
        <div class="container-fluid" id="appointments-user">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center row-header-fff">&mdash; This Month &mdash;</h1>
                </div>
                <?php
                    while ($d_row = mysqli_fetch_array($p_result)){
                    $app_id = $d_row['appointment_id'];
                    $doctor = $d_row['doctor_id'];
                    $date = $d_row['appoint_date'];

                    $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'" );
                    $doc =  mysqli_fetch_array($d_result);
                    echo '<div class="col-xs-12 col-md-6 col-lg-3" id="'.$d_row['appointment_id'].'">';
                    echo "<div class='panel panel-default' id='asd'><div class='panel-heading appointment-date' >";
                            echo $date;
                            echo "<a href=\"close.php?id=$d_row[appointment_id]&doc=$doctor&pat=$patient\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
                            <div class=\"panel-body\">";
                            echo '<p class="appointment-dr-name">Dr. ' . $doc['doctor_name'] . '</p>';
                            echo "</div><div class='appmnt-pnl-btn'>
                            <a class='btn btn-block btn-inverse appo tooltip' data-toggle='modal' data-target='.bs-example-modal-sm' data-id='".$app_id."' data-doctor-id='".$doctor."' title='edit this appointment'><span title='asdsad'><i class='fa fa-edit fa-lg'></i></span> Edit</a>";
                            echo '<p class="appointment-specs">' . $doc['specialization'] . '</p></div></div>';
                    echo '</div>';
                    }
                ?>
            </div>
        </div>

        <?php 
            include 'include/edit-modal.php';
            include 'include/scripts.php';
            include 'include/scrolltop.php';
        ?>  

        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>