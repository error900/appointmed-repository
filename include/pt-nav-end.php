                        <form class="navbar-form navbar-right" method="post" role="search">
                            <div class="input-group search-bar">
                                    <div id="divResult"></div>
                                <input type="text" class="form-control" name="search" placeholder="search doctor" id="inputSearch">

                                <span class="input-group-btn">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <div class="btn-group navbar-right signedin">
                            <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i><?php echo $patient_n ?>
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