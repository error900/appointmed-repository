<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Company Profile";
        include 'include/head.php';
    ?>
      <?php
        session_start();
        if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])){
            $loggedIn = $_SESSION['loggedIn']; 
            $account_type = $_SESSION['account_type'];
            if($loggedIn == true && $account_type == 'Patient')
                header("location: appointment.php");
            else 
                header("companyprofile.php");
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
                        <li><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>
                        <li class="active"><a href="companyprofile.php"><i class="fa fa-info-circle fa-lg"></i>Company Profile</a></li>
                        <li><a href="doctors.php"><i class="fa fa-user-md fa-lg"></i>Doctors</a></li>
                        <li><a href="signup.php"><i class="fa fa-pencil-square-o fa-lg"></i>Sign-up</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                        <button type="button" class="btn btn-default btn-noborder green-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Login<i class="fa fa-sign-in"></i></button>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">Company Profile</h1>
                </div>
                <div class="col-xs-12 col-md-8 company-profile">
                    <p><span>BenguetCorp Laboratories Inc.</span> Is a wholly owned subsidiary of publicly listed company Benguet Corporation. Benguet Corporation has more than a 100 year old history and tradition in the mining industry and is considered the industry leader. It has since branched into non-mining concerns, foremost of which is its foray into the healthcare industry.</p>
                    <p><span>BenguetCorp Laboratories Inc.</span> Operates a chain of outpatient medical and health facilities under the trade name Med Central. Med Central has three operating healthcare clinics: SM Baguio, Centermall Baguio and SM San Fernando, Pampanga.</p>
                    <p>Med Central’s branch in SM San Ferndo Pampanga is strategically located on the 2nd floor across the food court area. Two other branches in SM City Baguio and Centermall Baguio have been operational under the name Benguet Laboratories and has been the leading provider of medical services in the area.</p>
                    <p>As part of its expansion program, we have just opened our SM Taytay clinic last December 2013.</p>
                    <p>Med Central offers complete medical and laboratory diagnostic tests, APE, Pre-employment exam, drug testing, audiometry test, x-ray, pulmonary function test, 2D echo, ultrasound and other services. Its designed clinics boast of an airy and spacious reception area allowing patients maximum comfort while waiting for their medical appointment or laboratory results. Med Central houses modern medical equipment and technology ensuring efficient and accurate medical results.</p>
                    <p>Apart from the Outpatient Clinic Facilities, BCLI  is also embarking on the following projects which delivers its vision of continuously upgrading the quality of medical services to the people it cares for – the patients, members of the medical community, local communities and its stakeholders. These projects are :</p>
                    <p><span>1. The MedCentral Oncology Center</span> – dedicated to providing cancer patients and their families with medical consultations, outpatient treatment and wellness & counseling programs.</p>
                    <p>BCLI’s head office is located at the heart of the commercial business district of Makati with address at the 6th Floor of Universal- Re Building, 106 Paseo De Roxas Avenue corner Perea Street, Makati City. For inquiries, you may contact us at: Tel Nos: 8121380 loc. 241 and 7520717.</p>
                </div>
                <div class="col-xs-12 col-md-4 company-profile-img">
                    <img src="img/lab.jpg" class="img-responsive" alt="Responsive image">
                </div>
            </div>
        </div>
        <?php
            include 'include/user-login.php';
   //         include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>