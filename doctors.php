<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Doctors";
        include 'include/head.php';
        include 'connectdatabase.php';
    ?>
    <body class="e4e8e9-bg">
    <div class="container">
    <?php
        session_start();
        if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])){
            $loggedIn = $_SESSION['loggedIn']; 
            $account_type = $_SESSION['account_type'];
            if($loggedIn == true && $account_type == 'Patient')
                header("location: appointment.php");
            else 
                header("doctors.php");
        }
    ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand hidden-lg hidden-md" href="#">benguet labs</a>
                    <a class="navbar-brand logo-text hidden-sm hidden-xs" href="#">appoint.med</a>
                    <div class="navbar-logo hidden-sm hidden-xs">
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="companyprofile.php"><i class="fa fa-building"></i>Company Profile</a></li>
                        <li class="active"><a href="doctors.php"><i class="fa fa-users"></i>Doctors</a></li>
                        <li><a href="signup.php"><i class="fa fa-pencil-square-o"></i>Sign-up</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                        <button type="button" class="btn btn-default login-modal-btn btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">Doctors List</h1>
                </div>
            </div>
            <?php 
                $result = mysqli_query($con, "SELECT * FROM doctor ORDER BY specialization" );
                while($d_row =  mysqli_fetch_array($result)){
                    $doctor_id = $d_row['doctor_id'];
                    $doctor_name = $d_row['doctor_name'];
                    $specialization = $d_row['specialization'];
            ?>  
            <div class="row"> 
                <div class="doctors-full-list">
                    <div class="col-xs-12 col-md-12">
                        <h2 class="specialization-header"><?php echo $specialization?></h2>
                    </div>
                    <div class="col-xs-12 col-md-2">
                            <img src="img/profile/<?php 
                            $file = "img/profile/".$doctor_id.".jpg";
                            if(file_exists($file)){
                                echo $doctor_id;
                            }else{
                                echo 'profile';
                            } ?>.jpg">
                        
                   </div>
                      
                     <div class="col-xs-12 col-md-2">
                        <ul>
                            <li><span><?php echo $doctor_name?></span></li>
                    </div>
                    </div>
                </div>
                   <?php } ?>


        <?php
            include 'include/user-login.php';
         //   include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>