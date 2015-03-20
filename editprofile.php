<!DOCTYPE html>
<html lang="en">
<head>
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

</head>
    <?php
        $title = "Patient Profile";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
  <body>
    <div class="container">
        <?php 
            session_start();
            $loggedIn = $_SESSION['loggedIn'];
            $account_type = $_SESSION['account_type'];
            if($loggedIn == false)
                header("location: index.php");
            else if($account_type != 'Patient')
                header("location: index.php");
            
            //patient
            $username = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" ) or die(mysqli_error());
            $row =  mysqli_fetch_array($result);
            $patient_id = $row['patient_id'];
            $patient_n = $row['patient_name'];
            $p_result = mysqli_query($con, "SELECT * FROM appointment WHERE patient_id LIKE '$patient_id'" ) or die(mysqli_error());
            $p_row =  mysqli_fetch_array($p_result);
            $n_result = mysqli_query($con, "SELECT * FROM notification WHERE patient_id LIKE '$patient_id'" ) or die(mysqli_error());
        ?>
        <!-- navigation -->
        <?php 
            include 'include/pt-nav-start.php';
        ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Appointments <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="appointment.php">Today</a></li>
                                <li><a href="appointment_tom.php">Tomorrow</a></li>
                                <li><a href="appointment_week.php">This Week</a></li>
                                <li><a href="appointment_month.php">This Month</a></li>
                            </ul>
                        </li>
                        <li><a href="notifications.php">Notifications <span class="badge">22</span></a></li>
                        <li><a href="history.php">History</a></li>
        <?php 
            include 'include/pt-nav-end.php';
        ?>     
        <!-- /navigation -->
        <div class="container-fluid" id="patient-info">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <h1 class="text-center row-header">Edit Profile</h1>
                </div>
                <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <div class="edit-form">
                    <form method="post" action="edit_data.php" enctype="multipart/form-data">
                    <img src="img/profile/<?php 
                            $file = "img/profile/".$patient_id.".jpg";
                            if(file_exists($file)){
                                echo $patient_id;
                            }else{
                                echo 'profile_patient';
                            } ?>.jpg" class="img-responsive">
                            
                        <input type="file" name="profile_pic">
                        <input type="hidden" value="<?php echo $patient_id?>" name="patient_id">
                        <input type="submit" value="Upload" name="submit">
                    </form>
                        <form method='post' action="edit_this.php">
                            <div class="input-group">
                                <?php 
                                ?>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="" value="<?php echo $patient_n?>"/>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="" value="<?php echo $row['patient_contact']?>" />
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" required="" value="<?php echo $row['occupation']?>" />
                                <input class="btn btn-default login-btn btn-noborder" type="submit" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>

        <?php
            include 'include/scripts.php';
        ?>
        <script type="text/javascript" src="js/search.js"></script>
    </div>
  </body>
</html>