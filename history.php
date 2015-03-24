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
    <body class="background-pt">
    <div class="container">
        <?php 
            session_start();
            if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type']) && isset($_SESSION['username'])){
                $loggedIn = $_SESSION['loggedIn'];
                $account_type = $_SESSION['account_type'];
                $username = $_SESSION['username'];

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
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];

            $count_result = mysqli_query($con, "SELECT COUNT(notification) AS count FROM notification WHERE patient_id LIKE '$patient_id' AND indicator = 'doctor'" );
            $count_row = mysqli_fetch_array($count_result);
            $notif_count =  $count_row['count'];
  //          $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND (appoint_date = '$date_today')" );
        ?>
        <!-- navigation -->
        <?php 
            include 'include/pt-nav-start.php';
        ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="appointment_month.php">This Month</a></li>
                            </ul>
                        </li>
                        <li><a href="notifications.php">Notifications <span class="badge"><?php echo $notif_count?></span></a></li>
                        <li class="dropdown active"><a href="history.php">History</a></li>
                          <li class="nav-button navbar-right">
                            <button type="button" class="btn btn-default btn-noborder edit-profile-btn" data-toggle="modal" data-target=".bs-pt-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                            <i class="fa fa-pencil"></i>Edit Profile</button>
                        </li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>     


         <?php 
            include 'include/scripts.php';
            include 'include/scrolltop.php';
            include 'include/edit-profile-modal.php';

        ?>  

        <script type="text/javascript" src="js/search.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>