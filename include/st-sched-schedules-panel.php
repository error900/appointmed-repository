<?php
$walks = mysqli_query($con, "SELECT * FROM walk_in WHERE clinic_id LIKE '$clinic_id' AND appointW_date LIKE '$date' AND appointmentW_status LIKE 'Inqueue'");
if(mysqli_num_rows($a_result)>=1 || mysqli_num_rows($walks)>= 1){
    while ($row = mysqli_fetch_array($a_result)) {
        $patient = $row['patient_id'];
        $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
        $pat = mysqli_fetch_array($p_result);
        $queue_id = $row['queue_id'];
        $appointment_id = $row['appointment_id'];
        $c_id = $row['clinic_id'];
        
        $sched_date = date("F j , Y", strtotime($row['appoint_date']));

        $clinic_result = mysqli_query($con, "SELECT * FROM clinic WHERE clinic_id LIKE '$c_id'") or die(mysqli_error());
        $clinic_result_row = mysqli_fetch_array($clinic_result);
        $clinic_name = $clinic_result_row['clinic_name'];

        echo '<div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="panel panel-default sched-panel">';
        echo'<div class="panel-heading">';
        echo $pat['patient_name'];
        echo '<p class="queue-num">' . $queue_id . '</p>';
        echo '<input type="hidden" id="appointment_id" value="' . $appointment_id . '" name="appointment_id">';
        echo '</div>';
        echo' <div class="panel-body">';
        echo '<p>' . $sched_date . '</p>';
        echo '<p>' . $clinic_name . '</p>';
        echo '<p>' . $pat['patient_contact'] . '</p>';
        echo '</div>';
        echo'  <div class="appmnt-pnl-btns">
                                <button type="button" class="btn btn-default btn-inverse appo btn-noborder tooltip-bottom" data-tooltip="refer to a doctor" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="' . $appointment_id . '" data-patient-id="' . $patient . '">
                                <i class="fa fa-hand-o-right"></i>Refer</button>
                                <button type="button" class="btn btn-default btn-inverse appo btn-noborder" data-toggle="modal" data-target=".bs-st-remarks-modal-sm" data-a-id="' . $appointment_id . '" data-p-id="' . $patient . '">
                               <i class="fa fa-comment"></i>Remarks</button>
                            </div>
                     </div>
                   </div>';
    }
     while($row2 = mysqli_fetch_array($walks)){
            $c_id = $row2['clinic_id'];
            $walk_in_i = $row2['walk_in'];
            $sql_k = mysqli_query($con, "SELECT * FROM clinic WHERE clinic_id LIKE '$c_id'");
            $clinic = mysqli_fetch_array($sql_k);
            $clinic_name = $clinic['clinic_name'];
            $sched_date = date("F j , Y", strtotime($row2['appointW_date']));
            echo '<div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="panel panel-default sched-panel">';
                echo'<div class="panel-heading">';
                    echo $row2['walk_in_name'];
                    echo '<p class="queue-num">' . $row2['walk_in_id'] . '</p>';
                    echo '<input type="hidden" id="walk_in" value="' . $walk_in_i . '" name="walk_in">';
                echo '</div>';
                echo '<div class="panel-body">';
                    echo 'Walk-in Patient';
                    echo '<p class="appointment-header">' . $sched_date . '</p>';
                    echo '<p>' . $clinic_name . '</p>';
                echo '</div>';
                echo '<div class="appmnt-pnl-btns">
                    <button type="button" class="btn btn-default btn-inverse walk btn-noborder" data-toggle="modal" data-target=".bs-walk-remarks-modal-sm" data-walk-id="' . $walk_in_i . '">
                    <i class="fa fa-comment"></i>Remarks</button>
                    </div>';
            echo '</div></div>';
        }
}else{
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-warning" role="alert">
        <strong>There are no schedules.</strong></div>
        </div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    To know more about schedules click
    <strong> <a href="sec_help.php" class="alert-link">here</a></strong>.
    </div>
    </div>';
}
?>