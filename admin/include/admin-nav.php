<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand hidden-lg hidden-md" href="#">BenguetLabs</a>
            <a class="navbar-brand logo-text hidden-sm hidden-xs" href="#">appoint.med</a>
            <div class="navbar-logo hidden-sm hidden-xs">
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i>General<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="notifications.php">Notifications</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i>Announcements<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="announcements.php">Post</a></li>
                        <li><a href="announcement_list.php">History</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i>User Management<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="popdoc.php">Add Doctor</a></li> 
                        <li><a href="remove_user.php">Deactivate Users</a></li>
                        <li><a href="inactive.php">Idle Users</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i>Registrations<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="approve.php">Pending</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-navicon"></i>Current Database<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Import</a></li>
                        <li><a href="exportall.php">Export</a></li>
                    </ul>
                </li>
                <li class="hidden-sm hidden-xs tooltip-right" data-tooltip="Dashboard"><a href="dashboard.php" class="navicon-link"><i class="fa fa-dashboard fa-lg"></i>Dashboard</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right signedin">
                <div class="btn-group tooltip-left" data-tooltip="Me">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        admin
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> logout</a></li>
                    </ul>
                </div>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>