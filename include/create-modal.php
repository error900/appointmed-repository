<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input" method="post" action="addappointment.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputDate">Set Date</label>
                        <div class="input-group date" id="datetimepicker1">
                            <input type="date" class="form-control" name="date" required/>
                        </div>
                        <div class="input-group date" id="datetimepicker1">
                            <span class="input-group-addon">
                                <span class="fui-calendar-solid"></span>
                            </span>
                            <input type="text" class="form-control" name="date" required/>
                        </div>
                        <input type="hidden" value="<?php echo $patient ?>" name="patient_id">
                        <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                        <input type="hidden" value="" id="clinic_id" name="clinic_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                    echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Appoint Me</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>