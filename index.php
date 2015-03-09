<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Home";
        include 'include/head.php';
        include 'connectdatabase.php';
  
    ?>
    <?php
        session_start();
        if(isset($_SESSION['loggedIn']) && isset($_SESSION['account_type'])){
            $loggedIn = $_SESSION['loggedIn']; 
            $account_type = $_SESSION['account_type'];
            if($loggedIn == true && $account_type == 'Patient')
                header("location: appointment.php");
            else 
                header("index.php");
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
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
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
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                        <button type="button" class="btn btn-default login-modal-btn btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm">Login</button>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" id="index-frw">
            <div class="row">
                <div class="col-xs-12 col-md-7 visible-md visible-lg">
                <p class="login-text"><span>appoint.med</span> ... your online scheduling system that allows you to create appointments to a doctor chorva chorva.</p>
                </div>
                <div class="col-xs-12 col-md-4 visible-xs visible-sm">
                    <div class="usr-login">
                     <form method="post" action="login.php">
                        <div class="input-group">
                            <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                            <i class="fa fa-user field-icon"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                            <i class="fa fa-lock field-icon"></i>
                        </div>
                        <input class="btn btn-default login-btn btn-noborder" type="submit" value="Login" name="login"/>
                    </form>
                        <a class="login-link" href="signup.php">Don't have an account?</a>
                    </div>
                </div>
                <?php 
                    include 'include/user-login.php'
                 ?>
            </div>
        </div>
        <div class="container-fluid" id="clinics">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">Benguet Laboratories</h1>
                </div>
                <div class="col-xs-12 col-md-8">
                    <div class="g-map">
                        <iframe width="600" height="450" frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?q=Benguet%20Laboratories%20-%20SM%20City%20Baguio%2C&key=AIzaSyCbweT-jLxTUhNFbJE8FJdFuiL8x2hiNww"></iframe>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="map-location">
                        <p>
                            <i class="fa fa-location-arrow fa-2x"></i>
                            044 &amp; 045, Lower Ground Level SM City, Luneta Hill, Baguio City, Benguet, Philippines
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="bgh.html">
                                Baguio General Hospital Driveway, Baguio City,Benguet, Philippines
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-map-marker fa-lg"></i>
                            <a href="#">
                                Saint Louis University, Gen. Luna Road, Baguio City, Benguet, Philippines
                            </a>
                        </p>
                    </div>
                    <p class="text-right more-btn">
                        <a href="#" class="btn btn-default btn-noborder">show more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="about">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">About</h1>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/startup.png" alt="">
                        <p><span>ipsum dolor sit amet</span> consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/lab.png" alt="">
                        <p><span>Hospitals &amp; Laboratories</span> consectetur adipisicing elit</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/responsive.png" alt="">
                        <p><span>Responsive</span> display varies on different devices</p>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3">
                    <div class="about-icons text-center">
                        <img src="img/website.png" alt="">
                        <p><span>Online</span> make appointments anywhere</p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-7 company-profile">
                    <h2>Company Profile</h2>
                    <p>BenguetCorp Laboratories Inc. Is a wholly owned subsidiary of publicly listed company Benguet Corporation. Benguet Corporation has more than a 100 year old history and tradition in the mining industry and is considered the industry leader. It has since branched into non-mining concerns, foremost of which is its foray into the healthcare industry.</p>
                    <p>BenguetCorp Laboratories Inc. Operates a chain of outpatient medical and health facilities under the trade name Med Central. Med Central has three operating healthcare clinics: SM Baguio, Centermall Baguio and SM San Fernando, Pampanga.</p>
                    <p class="text-right more-btn">
                        <a href="companyprofile.php" class="btn btn-default btn-noborder">read more</a>
                    </p>
                </div>
                <div class="col-xs-12 col-md-5 ">
                    <img src="img/lab.jpg" class="img-responsive" alt="Responsive image">
                </div>
            </div>
        </div>
        <div class="container-fluid" id="doctors">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center row-header">Doctors</h1>
                </div>
                  <?php 
                    $doclist = mysqli_query($con, "SELECT * FROM doctor ORDER BY specialization");


               //     switch($doclist)
                ?>
                <div class="col-xs-12 col-md-6">
                    <div class="doctor-list">
                        <ul class="nav">
                            <?php /*
                                   while($fetch = mysqli_fetch_array($doclist)){
                                    switch($fetch['specialization']){
                                        case "Cardiology":
                                            echo '<li class="specialization">
                                                   <label>Cardiology</label>
                                                    <ul class="nav d-list">';
                                            echo '<li><a href="doctor.php?id='.$fetch['doctor_id'].'"><i class="fa fa-user-md"></i> Dr. '.$fetch['doctor_name'].'</a></li>';
                                            echo '</ul>';
                                    }
                                          /*  if($fetch['specialization'] == 'Cardiology'){
                                                echo '<li><a href="doctor.php?id='.$fetch['doctor_id'].'"><i class="fa fa-user-md"></i> Dr. '.$fetch['doctor_name'].'</a></li>';
                                          }
                                }*/
?>
                                 <?php
                            echo '<ul class="nav">
                                <li class="specialization">
                                    <label>Cardiology</label>
                                    <ul class="nav d-list">';
                                            while($fetch = mysqli_fetch_array($doclist)){
                                                if($fetch['specialization'] == 'Cardiology'){
                                                    echo '<li><a href="doctor.php?id='.$fetch['doctor_id'].'"><i class="fa fa-user-md"></i> Dr. '.$fetch['doctor_name'].'</a></li>';
                                                }
                                            }
                                echo '</ul></li>';    
                                     ?>     
                             
                             <?php 
                             echo '<li class="specialization">
                                    <label>CFP/ PCOM</label>
                                    <ul class="nav d-list">';     
                                            while($fetch1 = mysqli_fetch_array($doclist)){
                                                if($fetch1['specialization'] == 'Pcom'){
                                                    echo '<li><a href="doctor.php?id='.$fetch1['doctor_id'].'"><i class="fa fa-user-md"></i> Dr. '.$fetch1['doctor_name'].'</a></li>';
                                                }
                                            }
                                echo '</ul></li>';
                            ?>
                            <?php 
                             echo '<li class="specialization">
                                    <label>CFP/ Constructive Surgery</label>
                                    <ul class="nav d-list">';     
                                            while($fetch2 = mysqli_fetch_array($doclist)){
                                                if($fetch2['specialization'] == 'Constructive Surgery'){
                                                    echo '<li><a href="doctor.php?id='.$fetch2['doctor_id'].'"><i class="fa fa-user-md"></i> Dr. '.$fetch2['doctor_name'].'</a></li>';
                                                }
                                            }
                                echo '</ul></li>';
                            ?>

                            <li class="specialization">
                                <label>Dermatology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Aurora Hidalgo</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Faith Kishi Generao</a></li>
                                </ul>
                            </li>
                            
                            <li class="specialization">
                                <label>Endocrinology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Erickson Madronio</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>ENT</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Vanadero*</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Julio Eming</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Epidemiology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Donnabel Tubera</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>FM/ GP/ IM</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Eva Quiano</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>FM/ GP/PCOM</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Sheila Villanueva</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Melanie Clemente</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Ana Claire Pagnas</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Hosanna Mae Pajela</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Josie Rivera</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Sheila Mapalo</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Bernadette Arzadon</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Gastroeneterology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Marie Ellaine Velasquez</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>GP</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Hosanna Mae Pajela</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Mark Valdez</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>GP/Animal Bite</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Pakoy</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Internal Medicine</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Jeane Quibin</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Infectious Diseasee</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Margaret Apolinar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="doctor-list">
                        <ul class="nav">
                            <li class="specialization">
                                <label>Nephrology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Baby Ria Requiero*</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Gemma Pinlac</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Neurology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Neil Ambasing</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>OB Gyne</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Ranelyn Lozanes</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Bernadette Lizada</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Fedelina Suanding</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Wilma Lee</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Cherrie Ann Moreno</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Pamela Chu</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Rosario Laranang</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Oncology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Mary Gay Buliyat</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Opthalmology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Julieta Calaycay</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Nadine Tello</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. James Luz*</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Orthopedics</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Justiniano Bai*</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Antonio B. Suero</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Jean Pierre Leung</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Orthopedics/ GP</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Ma Victoria Palor</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Pediatrician</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Arlene Baguilat</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Mari Grace Yabut</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Rosemarie Raper</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Efren Balanag</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Melissa Ompico</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Neuro-Psychiatry</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr.Sylva Tsuchiya</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Psychology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Jean Jeanette Sibayan</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Pulmunology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Damaso Bangaoet*</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Agaton Yaranon</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Surgery</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Annie Rita Del Rosario</a></li>
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Matthew Bawayan</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>Urology</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Francis Yabut</a></li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label>UTZ</label>
                                <ul class="nav d-list">
                                    <li><a href="#"><i class="fa fa-user-md"></i>Dr. Orlando Aragon</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
          //  include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>