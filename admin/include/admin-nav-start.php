<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BenguetLabs</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-xs tooltip-left" data-tooltip="Dashboard"><a href="dashboard.php"><i class="fa fa-dashboard fa-lg"></i>Dashboard</a></li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>General<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="announcements.php">Announcements</a></li>
                        <li><a href="notifications.php">Notification</a></li>
                        <li><a href="#">Import</a></li>
                        <li><a href="exportall.php">Export</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>User Management<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="popdoc.php">Add Doctor</a></li>
                        <li><a href="remove_user.php">Remove user</a></li>
                        <li><a href="inactive.php">Inactive users</a></li>
                    </ul>
                </li>
                <li class="dropdown hidden-lg hidden-md">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"></i>Registrations<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="approve.php">Approve Users</a></li>
                    </ul>
                </li>
                <div class="btn-group navbar-right signedin tooltip-left" data-tooltip="Me">
                    <button type="button" class="btn btn-default btn-lg btn-noborder dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        admin
                        <span class="caret"></span>
                    </button>