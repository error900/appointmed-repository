<!-- Modal -->
<div class="modal fade settings-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="cut_off.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Clinic Settings</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group cutoff-number">
                        <h5>Number of patients you can accomodate for the clinic</h5>
                        <select name="cut_off_no" class="form-control">
                            <option selected>Number of patients
                                <?php for ($i = 50; $i >= 5; $i--) { ?>
                                <option value="<?php echo $i; ?>">
                                    <?php echo $i; ?>
                                </option> 
                            <?php } ?>
                        </select>
                        <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                        <input type="text" value="" id="clinic_id" name="clinic_id">

                        <div class="hr-line"></div>
                            <input type="button" class="btn btn-default btn-noborder green-btn form-control" id="showsec" value="Add Secretary">
                            <div id="secretary" style="display:none">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name"/>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name"/>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Submit</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade addClinic-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content addClinic">
            <form class="form-input"  method="post" action="add_clinic.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Clinic</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input type="text" class="form-control" name="clinic_name" placeholder="Clinic Name"/>
                        <input type="text" class="form-control" name="clinic_location" placeholder="Clinic Location"/>
                        <input type="text" class="form-control" name="clinic_contact" placeholder="Clinic Contact"/>
                        <input type="text" class="form-control" name="clinic_room" placeholder="Clinic Room"/>
                        <input type="text" class="form-control" name="clinic_days" placeholder="Clinic Days (e.g. Mon/Tue/Fri)"/>
                        <input type="text" class="form-control" name="clinic_time" placeholder="Clinic Time"/>
                        <input type="text" value="<?php echo $doctor_id?>" name="doctor_id">
                        <input type="text" value="" id="clin_id" name="clinic_id">

                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Done</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>