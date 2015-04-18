<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "Admin | Dashboard";
    include 'include/head.php';
    include '../connectdatabase.php';
    ?>

    <?php
    session_start();
    $loggedIn = $_SESSION['loggedIn'];
    $account_type = $_SESSION['account_type'];
    if ($loggedIn == false)
        header("location: index.php");
    else if ($account_type != 'Admin')
        header("location: index.php");

    $account_sql = mysqli_query($con, "SELECT * FROM account ");
    //    $account_row = mysqli_fetch_array($account_sql);
    ?>
    <body class="e4e8e9-bg">
        <?php
        include 'include/admin-nav-start.php';
        ?>
        <ul class="dropdown-menu" role="menu">
            <li><a href="change_password.php">Change Password</a></li>
            <li><a href="#">Help</a></li>
            <li class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
        </ul>
        <?php
        include 'include/admin-nav-end.php';
        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                include 'include/sidebar-navigation.php';
                ?>
                 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
                                <input type="submit" class="btn btn-default orange-btn" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>

        <?php
        include 'include/scripts.php';
        include '../include/scrolltop.php';
        ?>
        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="../js/scrolltop.js"></script>

    </body>
</html>