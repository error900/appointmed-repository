<ul class="nav navbar-nav hidden-lg hidden-md">
    <li class="dropdown active">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-calendar fa-lg"><span class="caret"></span></i>Appointments</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="appointment.php">Today</a></li>
            <li><a href="appointment_tom.php">Tomorrow</a></li>
            <li><a href="appointment_week.php">This Week</a></li>
            <li><a href="appointment_month.php">This Month</a></li>
        </ul>
    </li>
    <li>
        <a href="notifications.php">
            <i class="fa fa-bell fa-lg">
                <?php 
                    if ($notif_count == 0) 
                        echo '<span class="badge hide">' . $notif_count . '</span>';
                    else
                        echo '<span class="badge">' . $notif_count . '</span>';
                ?>
            </i>Notifications
        </a>
    </li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-history fa-lg"><span class="caret"></span></i>History</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="appointments_done.php">Appointments Done</a></li>
            <li><a href="cancelled_appointments.php">Cancelled Appointments</a></li>
        </ul>
    </li>
    