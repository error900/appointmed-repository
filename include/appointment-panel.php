<?php if (mysqli_num_rows($p_result) >= 1) { 

while ($d_row = mysqli_fetch_array($p_result)) {
    $app_id = $d_row['appointment_id'];
    $doctor = $d_row['doctor_id'];
    $date = $d_row['appoint_date'];

    $d_result = mysqli_query($con, "SELECT * FROM doctor WHERE doctor_id LIKE '$doctor'");
    $c_result = mysqli_query($con, "SELECT * FROM clinic WHERE doctor_id LIKE '$doctor'") or die(mysqli_error());
    $doc = mysqli_fetch_array($d_result);
    $clinic_name = mysqli_fetch_array($c_result);
    echo '<div class="col-xs-12 col-md-6 col-lg-3" id="' . $d_row['appointment_id'] . '">';
    echo "<div class='panel panel-default' id='asd'><div class='panel-heading appointment-date' >";
    echo $date;
    echo "<a href=\"close.php?id=$d_row[appointment_id]&doc=$doctor&pat=$patient_id\" onclick='return confirm(\"Do you want to cancel this appointment?\")' title=\"Cancel\"><i class=\"fa fa-remove fa-lg delete-btn\"></i></a></div>
    <div class=\"panel-body\">";
    echo '<p class="appointment-dr-name">Dr. ' . $doc['doctor_name'] . '</p>';
    echo '';
    echo '<p><i class="fa fa-location-arrow"></i> ' . $clinic_name['clinic_name'] . '</p>';
    echo "</div><div class='appmnt-pnl-btn'>
    <a class='btn btn-block btn-inverse appo tooltip' data-toggle='modal' data-target='.bs-example-modal-sm' data-id='" . $app_id . "' data-doctor-id='" . $doctor . "' title='edit this appointment'><span><i class='fa fa-pencil'></i></span> Edit</a>";
    echo '<p class="appointment-specs">' . $doc['specialization'] . '</p></div></div>';
    echo '</div>';
}
}else{
    echo '<div class="col-md-12">
    <h1 class="text-center row-header-fff">&mdash; Today &mdash;</h1>
</div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-warning" role="alert">
        <strong>There are no appointments!</strong> Better check yourself, youre not looking too good.</div>
        </div>';
    echo '<div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
    To know more about creating appointments please read the following
    <strong> <a href="help.php" class="alert-link">instructions</a></strong>.
    </div>
    </div>';
}
?>