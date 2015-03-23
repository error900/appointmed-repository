<div class="modal fade bs-edit-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="post" action="edit_data.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                            <img src="img/profile/<?php 
                                    $file = "img/profile/".$patient_id.".jpg";
                                    if(file_exists($file)){
                                        echo $patient_id;
                                    }else{
                                        echo 'profile_patient';
                                    } ?>.jpg" class="img-responsive">
                                
                            <input type="file" name="profile_pic">
                            <input type="hidden" value="<?php echo $patient_id?>" name="patient_id">
                            <input type="submit" value="Upload" name="submit">
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