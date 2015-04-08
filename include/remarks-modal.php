<div class="modal fade bs-remarks-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="remarks.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Remarks</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 remarks">
                            <div class="input-group">
                                <textarea class="form-control" rows="3" name="remarks" placeholder="Remarks and Recommendations"></textarea>
                                <select name="isComplete" class="form-control">
                                    <option value="Inqueue">Ongoing</option> 
                                    <option value="Completed">Completed</option>
                                </select>
                                <input type="hidden" value="" id="appoint_id" name="appointment_id">
                                <input type="hidden" value="" id="patient_id" name="patient_id">
                                <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Save</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /modal -->
<div class="modal fade bs-st-remarks-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="st-remarks.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Remarks</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 remarks">
                            <div class="input-group">
                                <textarea class="form-control" rows="3" name="remarks" placeholder="Remarks and Recommendations"></textarea>
                                <select name="isComplete" class="form-control">
                                    <option value="Inqueue">Ongoing</option> 
                                    <option value="Completed">Completed</option>
                                </select>
                                <input type="hidden" value="" id="app_id" name="appointment_id">
                                <input type="hidden" value="" id="pats_id" name="patient_id">
                                <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Save</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /modal -->