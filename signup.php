<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Home";
        include 'include/head.php';
  		include 'connectdatabase.php';
    ?>
    <?
    	
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if($loggedIn == true )
            header("location: appointment.php");
    ?>
    <head>

    </head>
    <body class="ecf0f1-bg">
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
                    <a class="navbar-brand" href="#">appoint.med</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clinics &amp; Hospitals <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.html">Benguet Laboratories</a></li>
                                <li><a href="bgh.html">Baguio General Hospital</a></li>
                                <li><a href="#">SLU Hospital</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Doctors</a></li>
                        <li class="active"><a href="signup.php">Signup</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-5 visible-md visible-lg">
                    <h1 class="text-center">************</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-xs-12 col-md-5 col-md-offset-1">
                    <h1 class="text-center">Signup</h1>
                    <div class="signup-form">
                        <form method='post' name='form1'>
                            <div class="input-group">
                                <input type="text" class="form-control" name="patientname" placeholder="Whole Name" required=""/>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required=""/>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" required=""/>
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" required=""/>
                                Age: <select name='age'><?php for($i=1; $i<=100; $i++){ ?>
                                <option value="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </option> 
                                    <?php } ?>
                                </select>
                                                    
                                <input type="password" class="form-control" name="password" placeholder="Password"  
                                required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if(this.checkValidity()) form1.password2.pattern = this.value;" required=""/>

                                <input type="password" class="form-control" name="password2" placeholder="Confirm Password" 
                                onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : 'Passwords do not match');"
                                />

                                <input class="btn btn-default login-btn" type="submit" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>