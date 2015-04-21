<div class="col-xs-6 col-md-2 col-md-offset-1">
    <div class="text-center circle inqueue">
        <?php
        $count_row = mysqli_query($con, "SELECT COUNT(*) AS Appointments FROM appointment NATURAL JOIN queue_notif WHERE doctor_id = '$doctor_id' AND clinic_id = '$clinic_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND appoint_date = '$date' ");
        $count = mysqli_fetch_assoc($count_row);
        if ($count == 0)
            echo '<p>' . '0' . '</p>';
        else
            echo '<p>' . $count['Appointments'] . '</p>';
        ?>
        <span>inqueue</span>
    </div>
</div>
<div class="col-xs-6 col-md-2">
    <div class="text-center circle served">
        <?php
        $count_row1 = mysqli_query($con, "SELECT COUNT(*) AS Appointments FROM appointment NATURAL JOIN queue_notif WHERE doctor_id = '$doctor_id' AND clinic_id = '$clinic_id' AND appointment_status = 'Completed' AND appoint_date = '$date' ");
        $count1 = mysqli_fetch_assoc($count_row1);
        if ($count1 == 0)
            echo '<p>' . '0' . '</p>';
        else
            echo '<p>' . $count1['Appointments'] . '</p>';
        ?>
        <span>served</span>
    </div>
</div>