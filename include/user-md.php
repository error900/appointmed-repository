<div class="col-xs-12 hidden-lg hidden-md text-right">
    <form action="export.php" method="post">
        <input type="hidden" name="doctor_id" value="<?php echo $doctor_id ?>">
        <input type="submit" class="btn btn-default btn-noborder green-btn" value="Export" name="submit">
    </form>
</div>
<div class="col-md-12 col-md-4 col-md-offset-2 user-md">
    <h1>Dr. <?php echo $doctor; ?></h1>
    <p><?php echo $row['specialization']; ?></p>
    <p><?php echo $c_row['clinic_location']; ?></p>
    <p class="email"><?php echo $row['email']; ?></p>
    <p><?php echo $c_row['clinic_contact']; ?></p>
</div>