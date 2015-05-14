<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Cardiology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Cardiology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                $file = "img/profile/" . $doctor_id . ".jpg";
                if (file_exists($file)) {
                    echo $doctor_id;
                } else {
                    echo 'profile';
                }
                ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'CFP/PCOM'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'CFP/PCOM'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                $file = "img/profile/" . $doctor_id . ".jpg";
                if (file_exists($file)) {
                    echo $doctor_id;
                } else {
                    echo 'profile';
                }
                ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Constructive Surgery'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Constructive Surgery'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                $file = "img/profile/" . $doctor_id . ".jpg";
                if (file_exists($file)) {
                    echo $doctor_id;
                } else {
                    echo 'profile';
                }
                ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Dermatology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Dermatology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                $file = "img/profile/" . $doctor_id . ".jpg";
                if (file_exists($file)) {
                    echo $doctor_id;
                } else {
                    echo 'profile';
                }
                ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Endocrinology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Endocrinology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                $file = "img/profile/" . $doctor_id . ".jpg";
                if (file_exists($file)) {
                    echo $doctor_id;
                } else {
                    echo 'profile';
                }
                ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'ENT'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'ENT'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Epidemiology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Epidemiology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'FM/GP/IM'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'FM/GP/IM'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'FM/GP/PCOM'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'FM/GP/PCOM'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Gastroenterology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Gastroenterology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'GP'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'GP'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'GP/Animal Bite'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'GP/Animal Bite'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Infectious Disease'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Infectious Disease'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Internal Medicine'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Internal Medicine'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Nephrology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Nephrology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Neuro-Psychiatry'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Neuro-Psychiatry'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Neurology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Neurology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'OB Gyne'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'OB Gyne'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Oncology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Oncology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Opthalmology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Opthalmology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Orthopedics'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Orthopedics'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Orthopedics/GP'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Orthopedics/GP'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Pediatrician'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Pediatrician'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Psychology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Psychology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Pulmunology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Pulmunology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Surgery'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Surgery'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Urology'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'Urology'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>
<div class="row"> 
    <?php 
        $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'UTZ'");
        while ($d_row = mysqli_fetch_array($result)) {
            $specialization = $d_row['specialization'];
        }
        echo '<div class="col-xs-12 col-md-12">';
            echo '<h2 class="specialization-header">' . $specialization . '</h2>';
        echo '</div>';
     ?>
    <?php
    $result = mysqli_query($con, "SELECT * FROM doctor WHERE specialization = 'UTZ'");
    while ($d_row = mysqli_fetch_array($result)) {
        $doctor_id = $d_row['doctor_id'];
        $doctor_name = $d_row['doctor_name'];
        $doctor_email = $d_row['email'];
        ?>
        <div class="doctors-full-list">
            <div class="col-xs-12 col-md-4">
                <img class="img-responsive" src="img/profile/<?php
                     $file = "img/profile/" . $doctor_id . ".jpg";
                     if (file_exists($file)) {
                         echo $doctor_id;
                     } else {
                         echo 'profile';
                     }
                     ?>.jpg">
                <div class="doctor-info">
                    <ul class="docors-list-info">
                        <li><span><i class="fa fa-user-md"></i><?php echo $doctor_name ?></span></li>
                        <li><span><i class="fa fa-envelope"></i><?php echo $doctor_email ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
<?php } ?>
</div>