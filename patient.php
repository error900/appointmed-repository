<!DOCTYPE html>
<html lang="en">

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
            $result = mysqli_query($con, "SELECT * FROM patient WHERE username LIKE '$username'" );
            $row =  mysqli_fetch_array($result);
            $patient = $row['patient_id'];
            $patient_n = $row['patient_name'];
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
                                <li><a href="#">Tomorrow</a></li>
                                <li><a href="#">This Week</a></li>
                                <li><a href="#">This Month</a></li>
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
                <div class="col-md-4 p-pic">
                    <img src="img/profile/yan.jpg">
                </div>
                <div class="col-md-5">
                    <div class="p-info">
                        <ul class="specs">
                            <li><?php echo $row['patient_name']; ?></li>
                            <li><?php echo $row['birthdate'];?></li>
                            <li><?php echo $row['age'];?></li>
                            <li><?php echo $row['occupation'];?></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-info">
                        <ul>
                            <li><?php echo $row['patient_contact']; ?></li>
                            <li><?php echo $row['email']; ?></li>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <ul></ul>
                </div>
            </div>
        </div>

        <?php
            include 'include/scripts.php';
        ?>
    </div>
  </body>
</html>