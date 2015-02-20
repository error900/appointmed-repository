<!DOCTYPE html>
<html lang="en">
    <?php
        $title = "appoint.med | Home";
        include 'include/head.php';
  
    ?>
    <?

        $loggedIn = $_SESSION['loggedIn'];
        $account_type = $_SESSION['account_type'];
        if($loggedIn == true )
            header("location: appointment.php");
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
                        <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class="container-fluid" id="index-frw">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                <p class="login-text"><span>appoint.med</span> ... your online scheduling system that allows you to create appointments to a doctor chorva chorva.</p>
                </div>
                <div class="col-xs-12 col-md-4">
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
            </div>
        </div>
        <div class="container-fluid" id="clinics">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h1 class="text-center clinic-h">Benguet Laboratories</h1>
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
            </div>
        </div>
        <div class="container-fluid" id="doctors">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h2 class="text-center doctor-h">Doctors</h2>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="doctor-list">
                        <ul class="nav">
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Cardiology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Karla Posadas</li>
                                    <li>Dr. Genuino*</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> CFP/ PCOM</label>
                                <ul class="nav d-list">
                                    <li>Dr. Florence Dela Pena</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Constructive Surgery</label>
                                <ul class="nav d-list">
                                    <li>Dr. Gene Estandian</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Dermatology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Aurora Hidalgo</li>
                                    <li>Dr. Faith Kishi Generao</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Endocrinology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Erickson Madronio</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> ENT</label>
                                <ul class="nav d-list">
                                    <li>Dr. Vanadero*</li>
                                    <li>Dr. Julio Eming</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Epidemiology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Donnabel Tubera</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> FM/ GP/ IM</label>
                                <ul class="nav d-list">
                                    <li>Dr. Eva Quiano</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> FM/ GP/PCOM</label>
                                <ul class="nav d-list">
                                    <li>Dr. Sheila Villanueva</li>
                                    <li>Dr. Melanie Clemente</li>
                                    <li>Dr. Ana Claire Pagnas</li>
                                    <li>Dr. Hosanna Mae Pajela</li>
                                    <li>Dr. Josie Rivera</li>
                                    <li>Dr. Sheila Mapalo</li>
                                    <li>Dr. Bernadette Arzadon</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Gastroeneterology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Marie Ellaine Velasquez</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> GP</label>
                                <ul class="nav d-list">
                                    <li>Dr. Hosanna Mae Pajela</li>
                                    <li>Dr. Mark Valdez</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> GP/Animal Bite</label>
                                <ul class="nav d-list">
                                    <li>Dr. Pakoy</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Internal Medicine</label>
                                <ul class="nav d-list">
                                    <li>Dr. Jeane Quibin</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Infectious Diseasee</label>
                                <ul class="nav d-list">
                                    <li>Dr. Margaret Apolinar</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="doctor-list">
                        <ul class="nav">
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Nephrology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Baby Ria Requiero*</li>
                                    <li>Dr. Gemma Pinlac</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Neurology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Neil Ambasing</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> OB Gyne</label>
                                <ul class="nav d-list">
                                    <li>Dr. Ranelyn Lozanes</li>
                                    <li>Dr. Bernadette Lizada</li>
                                    <li>Dr. Fedelina Suanding</li>
                                    <li>Dr. Wilma Lee</li>
                                    <li>Dr. Cherrie Ann Moreno</li>
                                    <li>Dr. Pamela Chu</li>
                                    <li>Dr. Rosario Laranang</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Oncology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Mary Gay Buliyat</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Opthalmology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Julieta Calaycay</li>
                                    <li>Dr. Nadine Tello</li>
                                    <li>Dr. James Luz*</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Orthopedics</label>
                                <ul class="nav d-list">
                                    <li>Dr. Justiniano Bai*</li>
                                    <li>Dr. Antonio B. Suero</li>
                                    <li>Dr. Jean Pierre Leung</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Orthopedics/ GP</label>
                                <ul class="nav d-list">
                                    <li>Dr. Ma Victoria Palor</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Pediatrician</label>
                                <ul class="nav d-list">
                                    <li>Dr. Arlene Baguilat</li>
                                    <li>Dr. Mari Grace Yabut</li>
                                    <li>Dr. Rosemarie Raper</li>
                                    <li>Dr. Efren Balanag</li>
                                    <li>Dr. Melissa Ompico</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Neuro-Psychiatry</label>
                                <ul class="nav d-list">
                                    <li>Dr.Sylva Tsuchiya</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Psychology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Jean Jeanette Sibayan</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Pulmunology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Damaso Bangaoet*</li>
                                    <li>Dr. Agaton Yaranon</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Surgery</label>
                                <ul class="nav d-list">
                                    <li>Dr. Annie Rita Del Rosario</li>
                                    <li>Dr. Matthew Bawayan</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> Urology</label>
                                <ul class="nav d-list">
                                    <li>Dr. Francis Yabut</li>
                                </ul>
                            </li>
                            <li class="specialization">
                                <label><i class="fa fa-caret-down"></i> UTZ</label>
                                <ul class="nav d-list">
                                    <li>Dr. Orlando Aragon</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include 'include/footer.php';
            include 'include/scrolltop.php';
            include 'include/scripts.php';
        ?>

        <script type="text/javascript" src="js/listslide.js"></script>
        <script type="text/javascript" src="js/scrolltop.js"></script>
    </div> <!-- /container -->
  </body>
</html>