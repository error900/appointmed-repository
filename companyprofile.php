<!DOCTYPE html>
<html lang="en">
    <?php
    $title = "appoint.med | Company Profile";
    include 'include/head.php';
    ?>
    <?php
    session_start();
    if (isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])) {
        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if ($loggedIn == true && $account_type == 'Patient')
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
                            <li class="tooltip-bottom" data-tooltip="Home"><a href="index.php"><i class="fa fa-home fa-lg"></i>Home</a></li>
                            <li class="active tooltip-bottom" data-tooltip="Company Profile"><a href="companyprofile.php"><i class="fa fa-info-circle fa-lg"></i>Company Profile</a></li>
                            <li class="tooltip-bottom" data-tooltip="Doctors"><a href="doctors.php"><i class="fa fa-user-md fa-lg"></i>Doctors</a></li>
                            <li class="tooltip-bottom" data-tooltip="Signup"><a href="signup.php"><i class="fa fa-pencil-square-o fa-lg"></i>Sign-up</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                            <button type="button" class="btn btn-default btn-noborder green-btn" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
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
                        <img src="img/lab.jpg" class="img-responsive" alt="Benguet Laboratories">
                    </div>
                </div>
                <div class="row">
                    <h1 class="row-header text-center">Other Services Offered:</h1>
                    <div class="col-xs-12 col-md-6 other-services">
                        <ul class="nav main-nav-label first">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Clinical Loboratory</label>
                                <ul class="nav items-list">
                                    <li>Complete blood count</li>
                                    <li>Complete blood chemistry</li>
                                    <li>Pap's Smear</li>
                                    <li>Urinalysis  / Fecalysis</li>
                                    <li>Semen Analysis</li>
                                    <li>HIV Testing</li>
                                    <li>Dengue testing</li>
                                    <li>Hepatitis Profile</li>
                                    <li>Gram Staining</li>
                                    <li>Widal Test / Typhidot</li>
                                    <li>Pregnancy Test (Urine Serum)</li>
                                    <li>TPHA / VDRL</li>
                                    <li>Thyroid Profile</li>
                                    <li>CRP , RF, ASOT</li>
                                    <li>H Pyloriod Test</li>
                                    <li>Rapid Screening Test</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav main-nav-label">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Drug Testing</label>
                                <ul class="nav items-list">
                                    <li>Pre-employment Medical Exam</li>
                                    <li>Annual Medical Exam</li>
                                    <li>LTO Requirement</li>
                                    <li>FireArm License</li>
                                    <li>School Requirement</li>
                                    <li>Post-Accident Evaluation</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav main-nav-label">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Digital Radiology Imaging</label>
                                <ul class="nav items-list">
                                    <li>X-ray</li> 
                                    <li>Mobile x-ray</li>
                                    <li>Ultrasonography</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav main-nav-label first">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Cardiolab</label>
                                <ul class="nav items-list">
                                    <li>Electrocardiogram (ECG)</li>
                                    <li>Adult 2D Echo</li>
                                    <li>Pedia 2D Echo</li>
                                    <li>Arterial Duplex Study</li>
                                    <li>Venous Duplex</li>
                                    <li>Carotoid Duplex scan</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-6 other-services">
                        <ul class="nav main-nav-label">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Specialty Clinics</label>
                                <ul class="nav items-list">
                                    <li>ENT</li>
                                    <li>Urology</li>
                                    <li>Carddiology</li>
                                    <li>Paediatrics</li>
                                    <li>Nephrology</li>
                                    <li>Pulmonology</li>
                                    <li>Dermatology</li>
                                    <li>Orthopaedics</li>
                                    <li>Ophthalmology</li>
                                    <li>Family Medicine</li>
                                    <li>Neuropsychiatry</li>
                                    <li>Internal Medicine</li>
                                    <li>Gastroenterology</li>
                                    <li>Clinical neurology</li>
                                    <li>Infectious Diseases</li>
                                    <li>Occupational Medicine</li>
                                    <li>Rehabilitation Medicine</li>
                                    <li>Obstetrics &amp; Gynaecology</li>
                                    <li>Surgery
                                        <span>General, colon, Retacl</span><br/>
                                        <span>Aesthetic / Plastic</span><br/>
                                        <span>Reconstructive</span><br/>
                                    </li>
                                    <li>Wellness clinic (vaccination)</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav main-nav-label">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Corporate Services</label>
                                <ul class="nav items-list">
                                    <li>Pre-employment Medical Exam</li> 
                                    <li>Annual Medical Exam</li>
                                    <li>On Site PE / APE Services (Mobile clinic)</li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav main-nav-label">
                            <li class="list">
                                <label><i class="fa fa-stethoscope"></i>Other services:</label>
                                <ul class="nav items-list">
                                    <li>Audiometry</li>
                                    <li>Physical Therapy</li>
                                    <li>Clinical psychology</li>
                                    <li>Neuro-psychiatric Examination</li>
                                    <li>Home Service (Blood Extraction, EcG, consultation)</li>
                                    <li>Medical Mission Organizer</li>
                                    <li>Medical Service Outsourcing</li>
                                </ul>
                            </li>
                        </ul>
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
            <script type="text/javascript" src="js/listslide.js"></script>
        </div> <!-- /container -->
    </body>
</html>