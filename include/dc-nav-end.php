                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="btn-group navbar-right signedin">
                        <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="signedin-photo">
                                <img class="img-responsive" src="img/profile/<?php 
                                $file = "img/profile/".$doctor_id.".jpg";
                                if(file_exists($file)){
                                    echo $doctor_id;
                                }else{
                                    echo 'profile';
                                } ?>.jpg">
                                </div>
                                <?php echo $doctor?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="doctor-profile.php">Profile</a></li>
                            <li><a href="changepassword.php">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="admin/logout.php"><i class="fa fa-power-off"></i>logout</a></li>
                        </ul>
                    </div>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>