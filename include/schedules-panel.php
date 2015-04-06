<?php

while ($row = mysqli_fetch_array($a_result)) {
    $patient = $row['patient_id'];
    $p_result = mysqli_query($con, "SELECT * FROM patient WHERE patient_id LIKE '$patient'");
    $pat = mysqli_fetch_array($p_result);

    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor_id'") or die(mysqli_error());
    $clinic_name = mysqli_fetch_array($c_result);
    $appointment_id = $row['appointment_id'];
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
    echo '<p><i class="fa fa-phone"></i>' . $pat['patient_contact'] . '</p>';
    echo '<p><i class="fa fa-location-arrow"></i>' . $clinic_name['clinic_name'] . '</p>';
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
?>