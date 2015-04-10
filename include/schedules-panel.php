<?php
if (mysqli_num_rows($a_result) >= 1) {
while ($row = mysqli_fetch_array($a_result)) {
    $patient = $row['patient_id'];
    $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
    $pat = mysqli_fetch_array($p_result);

    $appointment_id = $row['appointment_id'];

    $appointment_result = mysqli_query($con, "SELECT * FROM appointment WHERE appointment_id LIKE '$appointment_id'") or die(mysqli_error());
    $appointment_result_row = mysqli_fetch_array($appointment_result);
    $c_id = $appointment_result_row['clinic_id'];
    $sched_date = $appointment_result_row['appoint_date'];

    $clinic_result = mysqli_query($con, "SELECT * FROM clinic WHERE clinic_id LIKE '$c_id'") or die(mysqli_error());
    $clinic_result_row = mysqli_fetch_array($clinic_result);
    $clinic_name = $clinic_result_row['clinic_name'];

    echo '<div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-default sched-panel">';
    echo'<div class="panel-heading">';
    echo $pat['patient_name'];
    echo '<p class="queue-num">' . $appointment_id . '</p>';
    echo '<input type="hidden" id="appointment_id" value="' . $appointment_id . '" name="appointment_id">';
    //  echo "<a href=\"doctor_close.php?id=$row[appointment_id]&doc=$doctor_id&pat=$patient\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
    // <div class=\"panel-body\">";
    echo '</div>';
    echo' <div class="panel-body">';
    echo '<p><i class="fa fa-calendar"></i>' . $sched_date . '</p>';
    echo '<p><i class="fa fa-location-arrow"></i>' . $clinic_name . '</p>';
    echo '<p><i class="fa fa-phone"></i>' . $pat['patient_contact'] . '</p>';
    echo '</div>';
    echo'  <div class="appmnt-pnl-btn">
                            <button type="button" class="btn btn-default btn-inverse appo btn-noborder" data-toggle="modal" data-target=".bs-example-modal-sm" data-id="' . $appointment_id . '" data-patient-id="' . $patient . '">
                            Refer<i class="fa fa-hand-o-right"></i></button>
                            <button type="button" class="btn btn-default btn-inverse appo btn-noborder" data-toggle="modal" data-target=".bs-remarks-modal-sm" data-a-id="' . $appointment_id . '" data-p-id="' . $patient . '">
                           Remarks<i class="fa fa-comment"></i></button>
                        </div>
                 </div>
               </div>';
}
} else {
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-warning" role="alert">
        <strong>There are no schedules.</strong> Better check yourself, youre not looking too good.</div>
        </div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    To know more about your schedules click
    <strong> <a href="help.php" class="alert-link">here</a></strong>.
    </div>
    </div>';
}
?>