<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "Baguio General Hospital";
        include 'snippets/head.php';
    ?>
  <body class="ecf0f1-bg">
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
                    <li class="active"><a href="#">Home</a></li>
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
                    <li><a href="#">Signup</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid" id="index-frw">
        <div class="row">
            <div class="col-xs-12 col-md-7">
            <p class="login-text"><span>appoint.med</span> ... Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <div class="usr-login">
                    <div class="input-group">
                        <input type="text" class="form-control login-field" placeholder="Username">
                        <i class="fa fa-user field-icon"></i>
                    </div>

                    <div class="input-group">
                        <input type="password" class="form-control login-field" placeholder="Password">
                        <i class="fa fa-lock field-icon"></i>
                    </div>

                    <a class="btn btn-default login-btn" href="#">Log in</a>
                    <a class="login-link" href="signup.html">Don't have an account?</a>
                </div>
            </div>
            <div class="col-md-2 visible-lg">
                <div class="login-arrow">
                    <p>consult now!</p>
                    <img src="img/login-arrow.png" alt="arrow">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="about">
        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="about-icons text-center">
                    <img src="img/startup.png" alt="">
                    <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="about-icons text-center">
                    <img src="img/website.png" alt="">
                    <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="about-icons text-center">
                    <img src="img/lab.png" alt="">
                    <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="about-icons text-center">
                    <img src="img/responsive.png" alt="">
                    <p>ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="clinics">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <div>
                    <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=baguio%20general%20hospital&key=AIzaSyCbweT-jLxTUhNFbJE8FJdFuiL8x2hiNww"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="doctors">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
    <?php
        include 'snippets/footer.php';
    ?>
    <?php
        include 'snippets/scripts.php';
    ?>

  </body>
</html>