<div class="modal fade bs-st-walk-in-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="walk-in.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Walk-in Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 remarks">
                            <div class="input-group">
<!--                            <input type="hidden" value="" id="app_id" name="appointment_id">
                                <input type="hidden" value="" id="pats_id" name="patient_id"> -->
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required> 
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required> 
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
</div>