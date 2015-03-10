                        <form class="navbar-form navbar-right" method="post" role="search">
                            <div class="input-group search-bar">
                                    <div id="divResult"></div>
                                <input type="text" class="form-control" name="search" placeholder="search doctor" id="inputSearch">

                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                        <li class="visible-xs visible-sm"><a href="patient.php">Profile</a></li>
                        <li class="visible-xs visible-sm"><a href="#">Another action</a></li>
                        <li class="visible-xs visible-sm"><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                    </ul>
                    <div class="btn-group navbar-right signedin">
                        <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown" aria-expanded="false">
                            <?php echo $patient_n ?>
                            <span class="caret"></span>
                        </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="patient.php">Profile</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php"><i class="fa fa-power-off"></i>    logout</a></li>
                            </ul>
                    </div>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>