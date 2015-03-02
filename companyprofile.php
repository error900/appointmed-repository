<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Company Profile";
        include 'include/head.php';
    ?>
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
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-7 company-profile">
                    <h2 class="text-center">Company Profile</h2>
                    <p>BenguetCorp Laboratories Inc. Is a wholly owned subsidiary of publicly listed company Benguet Corporation. Benguet Corporation has more than a 100 year old history and tradition in the mining industry and is considered the industry leader. It has since branched into non-mining concerns, foremost of which is its foray into the healthcare industry.</p>
                    <p>BenguetCorp Laboratories Inc. Operates a chain of outpatient medical and health facilities under the trade name Med Central. Med Central has three operating healthcare clinics: SM Baguio, Centermall Baguio and SM San Fernando, Pampanga.</p>
                    <p>Med Central’s branch in SM San Ferndo Pampanga is strategically located on the 2nd floor across the food court area. Two other branches in SM City Baguio and Centermall Baguio have been operational under the name Benguet Laboratories and has been the leading provider of medical services in the area.</p>
                    <p>As part of its expansion program, we have just opened our SM Taytay clinic last December 2013.</p>
                    <p>Med Central offers complete medical and laboratory diagnostic tests, APE, Pre-employment exam, drug testing, audiometry test, x-ray, pulmonary function test, 2D echo, ultrasound and other services. Its designed clinics boast of an airy and spacious reception area allowing patients maximum comfort while waiting for their medical appointment or laboratory results. Med Central houses modern medical equipment and technology ensuring efficient and accurate medical results.</p>
                    <p>Apart from the Outpatient Clinic Facilities, BCLI  is also embarking on the following projects which delivers its vision of continuously upgrading the quality of medical services to the people it cares for – the patients, members of the medical community, local communities and its stakeholders. These projects are :</p>
                    <p>1. The MedCentral Oncology Center – dedicated to providing cancer patients and their families with medical consultations, outpatient treatment and wellness & counseling programs.</p>
                    <p>BCLI’s head office is located at the heart of the commercial business district of Makati with address at the 6th Floor of Universal- Re Building, 106 Paseo De Roxas Avenue corner Perea Street, Makati City. For inquiries, you may contact us at: Tel Nos: 8121380 loc. 241 and 7520717.</p>
                </div>
                <div class="col-xs-12 col-md-5 ">
                    <img src="img/lab.jpg" class="img-responsive" alt="Responsive image">
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