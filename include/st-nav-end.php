            <li class="nav-button hidden-sm hidden-xs">
                <form action="export.php" method="post">
                    <input type="hidden" name="doctor_id" value="<?php echo $doctor_id ?>">
                    <input type="submit" class="btn btn-default btn-noborder green-btn" value="Export" name="submit">
                </form>
            </li>
            <li class="nav-button navbar-right">
                <button type="button" class="btn btn-default btn-noborder green-btn nav-button" data-toggle="modal" data-target=".bs-st-edit-profile-modal-lg" data-id="'.$appointment_id.'" data-patient-id="'.$patient_id.'">
                    <i class="fa fa-pencil"></i>Update Info</button>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right signedin">
                <div class="btn-group navbar-right">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="signedin-photo">
                            <img class="img-responsive" src="img/profile/<?php
                            $file = "img/profile/" . $secretary_id . ".jpg";
                            if (file_exists($file)) {
                                echo $secretary_id;
                            } else {
                                echo 'profile';
                            }
                            ?>.jpg">
                        </div>
            <?php echo $secretary ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="secretary-profile.php"><i class="fa fa-user"></i>Profile</a></li>
                        <li><a href="sec_changepassword.php"><i class="fa fa-unlock-alt"></i>Change Password</a></li>
                        <li><a href="sec_help.php"><i class="fa fa-question-circle"></i>Help</a></li>
                        <li class="divider"></li>
                        <li><a href="admin/logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                    </ul>
                </div>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>