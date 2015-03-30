<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="referral.php">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Refer</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group refer-modal">
                            <label for="inputDate">Choose Doctor: </label>
                            <select class="form-control" name="referred_id">
                                <?php 
                                while ($row2 = mysqli_fetch_array($sqls)){
                                ?>
                                <option value='<?php echo $row2['doctor_id']?>' ><?php echo $row2['doctor_name']?></option> ;
                                <?php   } ?>
                            </select>                                      
                            <input type="hidden" id="pat_id" value="" name="patient_id">
                            <input type="hidden" value="<?php echo $doctor_id?>" name="doctor_id">
                            <input type="hidden" id="appo_id" value="" name="appointment_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                        echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                        echo "<button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Refer</button>";
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>