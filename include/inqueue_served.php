<div class="col-xs-6 col-md-2 col-md-offset-1">
    <div class="text-center circle inqueue">
        <?php
        $count_row = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif  WHERE doctor_id = '$doctor_id' AND (appointment_status = 'Inqueue' OR appointment_status = 'Referred') AND appoint_date = '$date' ");
        $count = mysqli_num_rows($count_row);
        $count_walk_in = mysqli_query($con, "SELECT * FROM walk_in where clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$date' AND appointment_status = 'Inqueue'");
        $count_w = mysqli_num_rows($count_walk_in);
        if($count == 0){
            $total_count = $count_w;
        }else
            $total_count = $count + $count_w;
            
        if ($total_count == 0)
            echo '<p>' . '0' . '</p>';
        else
            echo '<p>' . $total_count . '</p>';
        ?>
        <span>inqueue</span>
    </div>
</div>
<div class="col-xs-6 col-md-2">
    <div class="text-center circle served">
        <?php
        $count_row1 = mysqli_query($con, "SELECT * FROM appointment NATURAL JOIN queue_notif WHERE doctor_id = '$doctor_id' AND appointment_status = 'Completed' AND appoint_date = '$date' ");
        $count1 = mysqli_num_rows($count_row1);
        $count_walk_in1 = mysqli_query($con, "SELECT * FROM walk_in WHERE clinic_id LIKE '$clinic_id' AND appoint_date LIKE '$date' AND appointment_status = 'Completed'");
        $count_w1 = mysqli_num_rows($count_walk_in1);
        if($count1 == 0){
            $total_count1 = $count_w1;
        }else
            $total_count1 = $count1 + $count_w1;
        if ($total_count1 == 0)
            echo '<p>' . '0' . '</p>';
        else
            echo '<p>' . $total_count1 . '</p>';
        ?>
        <span>served</span>
    </div>
</div>