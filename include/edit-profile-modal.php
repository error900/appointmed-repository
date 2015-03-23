<div class="modal fade bs-edit-profile-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form method="post" action="edit_data.php" enctype="multipart/form-data">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /modal -->