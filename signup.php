<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "appoint.med | Home";
    include 'include/head.php';
    include 'connectdatabase.php';
    ?>
    <?php
    session_start();
    if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])) {
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if ($loggedIn == true && $account_type == 'Patient')
            header("location: appointment.php");
        else
            header("signup.php");
    }
    ?>
    <body class="e4e8e9-bg">
        <div class="container">
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
                        <ul class="nav navbar-nav nav-parent">
                            <li class="tooltip-bottom" data-tooltip="Home"><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>
                            <li class="tooltip-bottom" data-tooltip="Company Profile"><a href="companyprofile.php"><i class="fa fa-info-circle fa-lg"></i>Company Profile</a></li>
                            <li class="tooltip-bottom" data-tooltip="Doctors"><a href="doctors.php"><i class="fa fa-user-md fa-lg"></i>Doctors</a></li>
                            <li class="active tooltip-bottom" data-tooltip="Signup"><a href="signup.php"><i class="fa fa-pencil-square-o fa-lg"></i>Sign-up</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                            <button type="button" class="btn btn-default btn-noborder green-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-md-offset-1">
                        <h1 class="text-center row-header-lc">Forgot Password?</h1>
                        <div class="forgot-password">
                            <form method="post" action="" name="form1">
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address"/>
                                    
                                    <input type="submit" class="btn btn-default orange-btn btn-noborder" value="Submit" name="submit"/>
                                </div>
                            </form>
                            <div class="signup-ad hidden-xs hidden-sm">
                                <p>Look for available clinics and doctors online</p>
                                <p>Be the first on the list by creating appointments</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-md-offset-1">
                        <h1 class="text-center row-header-lc hidden-lg hidden-md">Signup Now</h1>
                        <div class="signup-form">
                            <form method='post' name='form1' action="register.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name" required=""/>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name" required=""/>
                                    <input type="email" class="form-control" name="email" placeholder="Email Address" required=""/>
                                    <input type="text" class="form-control" name="contact" placeholder="Contact Number" required=""/>
                                    <input type="text" class="form-control" name="occupation" placeholder="Occupation" required=""/>
                                    <label><i class="fa fa-birthday-cake"></i>Birthday</label>
                                    <select name="birth_month" class="form-control">
                                        <option selected>Month
                                        <option value=1>January
                                        <option value=2> February
                                        <option value=3>March
                                        <option value=4>April
                                        <option value=5>May
                                        <option value=6>June
                                        <option value=7>July
                                        <option value=8>August
                                        <option value=9>September
                                        <option value=10>October
                                        <option value=11>November
                                        <option value=12>December 
                                    </select>
                                    <select name="birth_day" class="form-control">
                                        <option selected>Day
                                            <?php for ($i = 1; $i <= 31; $i++) { ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                    <select name="birth_year" class="form-control">
                                        <option selected>Year
                                            <?php for ($i = 1900; $i <= 2015; $i++) { ?>
                                            <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>
                                            </option> 
                                        <?php } ?>
                                    </select>
                                    <input type="text" class="form-control" name="username" placeholder="Username" id="username" required=""/>  
                                    <span id="result"></span>        
                                    <!--<input type="password" class="form-control" name="password" placeholder="Password"  
                                           required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                           onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                        if (this.checkValidity())
                                            form1.password2.pattern = this.value;" required=""/>  
                                    <p class="passwordReq">Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>

                                    <input type="password" title="Passwords do not match" class="form-control" name="password2" placeholder="Confirm Password" 
                                           onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                           />-->
                                    <input class="btn btn-default orange-btn" type="submit" value="Submit" name="submit"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'include/user-login.php';
            //    include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
            ?>
            <script type="text/javascript" src="js/scrolltop.js"></script>
        </div> <!-- /container -->
    </body>
</html>