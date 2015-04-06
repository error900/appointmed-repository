<div class="modal fade bs-pt-edit-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 upload-photo">
                        <form method="post" action="edit_data.php" enctype="multipart/form-data">
                            <div class="input-group">
                                <div>
                                    <img src="img/profile/<?php
                                    $file = "img/profile/" . $patient_id . ".jpg";
                                    if (file_exists($file)) {
                                        echo $patient_id;
                                    } else {
                                        echo 'profile_patient';
                                    }
                                    ?>.jpg" class="img-responsive">
                                </div>
                                <input type="file" class="file-upload" name="profile_pic">
                                <input type="hidden" value="<?php echo $patient_id ?>" name="patient_id">
                                <input type="submit" class="btn btn-default upload-btn btn-noborder" class="btn btn-default login-btn btn-noborder"  value="Save" name="submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-2 profile-data-edit">
                        <h1 class="text-center row-header3">Current Data</h1>
                        <form method='post' action="edit_this.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo $patient_n ?>"/>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" required="" value="<?php echo $row['patient_contact'] ?>" />
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" required="" value="<?php echo $row['occupation'] ?>" />
                                <input type="hidden" value="<?php echo $patient_id ?>" name="patient_id">
                                <input class="btn btn-default login-btn btn-noborder" type="submit" value="Submit" name="submit"/>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
                ?>
            </div>
        </div>
    </div>
</div> <!-- /modal -->

<div class="modal fade bs-dc-edit-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 upload-photo">
                        <form method="post" action="edit_pic_doc.php" enctype="multipart/form-data">
                            <div class="input-group">
                                <div>
                                    <img src="img/profile/<?php
                                    $file = "img/profile/" . $doctor_id . ".jpg";
                                    if (file_exists($file)) {
                                        echo $doctor_id;
                                    } else {
                                        echo 'profile_patient';
                                    }
                                    ?>.jpg" class="img-responsive">
                                </div>
                                <input type="file" class="file-upload" name="profile_pic">
                                <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                                <input type="submit" class="btn btn-default upload-btn btn-noborder" class="btn btn-default login-btn btn-noborder"  value="Save" name="submit">
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-2 profile-data-edit">
                        <h1 class="text-center row-header3">Current Data</h1>
                        <form method='post' action="edit_profile_doc.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo $doctor ?>"/>
                                <input type="text" class="form-control" name="specialization" placeholder="Specialization" required="" value="<?php echo $specialization ?>" />
                                <input type="text" class="form-control" name="email" placeholder="Email Address" required="" value="<?php echo $email ?>" />
                                <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                                Change Status: <select name="doctor_status">
                                    <option value="In">In</option>
                                    <option value="Out">Out</option>
                                    <option value="Break">Break</option>
                                </select>
                                <div class="col-xs-6 col-md-6 add-form">
                                    <input type="button" class="btn btn-default btn-noborder" id="hideshow" value="Add Clinic">
                                </div>
                                <div class="col-xs-6 col-md-6 add-form">
                                    <input type="button" class="btn btn-default btn-noborder" id="showsec" value="Add Secretary">
                                </div>
                                <div id="clinics" style="display:none">
                                    <p>Clinic</p>
                                    <input type="text" class="form-control" name="clinic_name" placeholder="Clinic Name"/>
                                    <input type="text" class="form-control" name="clinic_location" placeholder="Clinic Location"/>
                                    <input type="text" class="form-control" name="clinic_contact" placeholder="Clinic Contact"/>
                                </div>
                                <div id="secretary" style="display:none">
                                    <p>Secretary</p>
                                    <input type="text" class="form-control" name="firstname" placeholder="First Name"/>
                                    <input type="text" class="form-control" name="lastname" placeholder="Last Name"/>
                                </div>

                                <input class="btn btn-default login-btn btn-noborder" type="submit" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                echo '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
                ?>
            </div>
        </div>
    </div>
</div> <!-- /modal -->