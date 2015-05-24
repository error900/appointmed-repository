<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Change Password";
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

    $date = date('Y-m-d');
    $username = $_SESSION['username'];
    $sql = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic_schedule WHERE doctor_status = 'In' ORDER BY doctor_name");

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
                        <li><a href="index.php">sadsfsd</a></li>
                        <li><a href="">sdfsdsf</a></li>
                    </ul>
                </li>
                <?php
                include 'include/fd-nav-end.php';
                ?>
                 <div class="col-xs-12 col-md-4 col-md-offset-4">
                    <h1 class="text-center row-header-lc">Change Password</h1>
                    <div class="signup-form">
                        <form method="post" action="change_doc_pass.php" name="form1">
                            <div class="input-group">
                                <input type="password"  class="form-control" required="" name="old_password" placeholder="Old password"/>

                                <input type="hidden" name="username" value="<?php echo $username?>"/>
                                <input type="password" class="form-control" name="password" placeholder="New Password"  
                                required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if (this.checkValidity())
                                form1.password2.pattern = this.value;" required=""/>  
                                <p class="passwordReq">Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>

                                <input type="password" title="Passwords do not match" class="form-control" name="password2" placeholder="Confirm New Password" 
                                onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                />
                                <input type="submit" class="btn btn-default orange-btn btn-noborder" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
                <script type="text/javascript" src="js/scrolltop.js"></script>
                <script type="text/javascript" src="js/search.js"></script>
        </div>
    </body>
</html>