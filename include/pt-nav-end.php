            <li class="nav-button navbar-right">
                <button type="button" class="btn btn-default btn-noborder green-btn" data-toggle="modal" data-target=".bs-pt-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                <i class="fa fa-pencil"></i>Update Info</button>
            </li>
            <form class="navbar-form navbar-right" method="post" role="search">
                <div class="input-group search-bar">
                    <ul class="dropdown-menu divResult" role="menu">
                    </ul>
                    <input type="text" class="form-control" name="search" placeholder="search doctor" id="inputSearch">

                    <span class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            </ul>
            <ul class="nav navbar-nav navbar-right signedin">
                <div class="btn-group navbar-right">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="signedin-photo">
                            <img src="img/profile/<?php
                            $file = "img/profile/" . $patient_id . ".jpg";
                            if (file_exists($file)) {
                                echo $patient_id;
                            } else {
                                echo 'profile_patient';
                            }
                            ?>.jpg" class="img-responsive">
                        </div>
            <?php echo $patient_n ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="patient.php">Profile</a></li>
                        <li><a href="help.php">Help</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                    </ul>
                </div>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>