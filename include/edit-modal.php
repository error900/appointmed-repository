<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="editappointment.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class='fa fa-pencil'></i> Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label for="inputDate">Choose new date: </label>                                
                        <input type="date" class="form-control" name="appdate" value="<?php echo date('Y-m-d'); ?>" required/>
                        <input type="hidden" id="appo_id" name="appointment_id" value="">
                        <input type="hidden" id="doc_id"  name="doctor_id" value="">
                        <input type="hidden" id="clin_id"  name="clinic_id" value="">
                        <input type="hidden" id="days"  name="days" value="">
                        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>">
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
</div> <!-- /modal -->