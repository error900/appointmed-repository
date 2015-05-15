                <form class="navbar-form navbar-right" method="post" role="search" action="search.php">
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
                            <img class="img-responsive" src="img/profile/<?php
                            $file = "img/profile/" . $secretary_id . ".jpg";
                            if (file_exists($file)) {
                                echo $secretary_id;
                            } else {
                                echo 'profile_avatar';
                            }
                            ?>.jpg">
                        </div>
            <?php echo "Juanita Dela Cruz"; ?>
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