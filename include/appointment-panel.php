<?php
if (mysqli_num_rows($p_result) >= 1) {
    while ($d_row = mysqli_fetch_array($p_result)) {
        $app_id = $d_row['appointment_id'];
        $doctor = $d_row['doctor_id'];
        $date = $d_row['appoint_date'];
        $date = date("F j , Y", strtotime($date));
        $c_id = $d_row['clinic_id'];

        $d_result = mysqli_query($con, "SELECT * FROM doctor NATURAL JOIN clinic NATURAL JOIN clinic_schedule WHERE doctor_id LIKE '$doctor' AND clinic_id LIKE '$c_id'");
        $doc = mysqli_fetch_array($d_result);

        $clinic_name = $doc['clinic_name'];
        $days = $doc['days'];

        $queue = mysqli_query($con, "SELECT * FROM queue_notif WHERE appointment_id LIKE '$app_id' ");
        $queue_row = mysqli_fetch_array($queue);
        $queue_id = $queue_row['queue_id'];
        $queue_date = $queue_row['appoint_date'];

        echo '<div class="col-xs-12 col-md-6 col-lg-3" id="' . $d_row['appointment_id'] . '">';
        echo "<div class='panel panel-default' id='asd'><div class='panel-heading appointment-date' >";
        echo $date;
        echo "<a href=\"close.php?id=$d_row[appointment_id]&doc=$doctor&pat=$patient_id&cid=$c_id&qid=$queue_id&qd=$queue_date\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
    <div class=\"panel-body\">";
        echo '<p class="appointment-header">Dr. ' . $doc['doctor_name'] . '</p>';
        echo '<p>' . $clinic_name . '</p>';
        echo '<p class="pt-queue-number"><span>'.$queue_id.'</span></p>';
        echo "</div><div class='appmnt-pnl-btns'>
    <a class='btn btn-block appo tooltip-top' data-toggle='modal' data-target='.bs-example-modal-sm' data-id='" . $app_id . "' data-doctor-id='" . $doctor . "' data-clinic-id='" . $c_id . "' data-days='".$days."' data-tooltip='edit this appointment'><span><i class='fa fa-pencil'></i></span> Edit</a>";
        echo '<p class="appointment-specs">' . $doc['specialization'] . '</p></div></div>';

        echo '</div>';
    }
} else {
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-warning" role="alert">
        <strong>There are no appointments.</strong> Try searching doctors.</div>
        </div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    To know more about creating appointments please read the following
    <strong> <a href="help.php" class="alert-link">instructions</a></strong>.
    </div>
    </div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
    <div class="alert alert-warning" role="alert">
        Don\'t know which doctor to appoint to? Click <b><a href="doctor.php?id=6aa29f6">here</a></b>.
    </div>
    </div>';
}
?>