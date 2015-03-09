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
        <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#username").keyup(function (e) {

                    $(this).val($(this).val().replace(/\s/g, ''));
                    
                    var username = $(this).val();
                    
                        $("#result").html('<img src="img/ajax-loader.gif" />');
                        $.post('checkusername.php', {'username':username}, function(data) {
                          $("#result").html(data);
                        });
                }); 
            });
        </script>
    </head>

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
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="companyprofile.php">About</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clinics &amp; Hospitals <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.html">Benguet Laboratories</a></li>
                                <li><a href="bgh.html">Baguio General Hospital</a></li>
                                <li><a href="#">SLU Hospital</a></li>
                            </ul>
                        </li>
                        <li><a href="doctors.php">Doctors</a></li>
                        <li class="active"><a href="signup.php">Signup</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                        <button type="button" class="btn btn-default login-modal-btn btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
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
                        

                         <form method='post' name='form1' action="register.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required=""/>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required=""/>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" required=""/>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" required=""/>
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" required=""/>
                          <div>Birthdate</div>
                                Month: <select name=birth_month>
                                        <option selected value=1>January
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
                               Day: <select name=birth_day>
                                        <?php for($i=1; $i<=31; $i++){ ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </option> 
                                            <?php } ?>
                                    </select>
                               Year: <select name=birth_year>
                                        <?php for($i=1900; $i<=2015; $i++){ ?>
                                        <option value="<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </option> 
                                            <?php } ?>
                                    </select>
                                
                                <input type="text" class="form-control" name="username" placeholder="Username" id="username" required=""/>  
                                <span id="result"></span>        
                                <input type="password" class="form-control" name="password" placeholder="Password"  
                                required pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" 
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');
                                if(this.checkValidity()) form1.password2.pattern = this.value;" required=""/>  
                                <p class="passwordReq">*Your password must contain uppercase and lowercase letters, and it should not be lower than 6 characters. </p>
                                
                                <input type="password" title="Passwords do not matcch" class="form-control" name="password2" placeholder="Confirm Password" 
                                onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"
                                />

                                <input class="btn btn-default login-btn" type="submit" value="Submit" name="submit"/>
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