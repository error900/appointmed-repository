
<div class="modal fade bs-st-edit-profile-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-md-4 col-md-offset-1 upload-photo">
                        <form method="post" action="edit_pic_sec.php" enctype="multipart/form-data">
                            <div class="input-group">
                                <div>
                                    <img src="img/profile/<?php
                                    $file = "img/profile/" . $secretary_id . ".jpg";
                                    if (file_exists($file)) {
                                        echo $secretary_id;
                                    } else {
                                        echo 'profile';
                                    }
                                    ?>.jpg" class="img-responsive">
                                </div>
                                <input type="file" class="file-upload form-control" name="profile_pic">
                                <input type="hidden" value="<?php echo $secretary_id ?>" name="secretary_id">
                                <input class="btn btn-default btn-noborder black-btn" type="submit" value="Submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-12 col-md-5 col-md-offset-1 profile-data-edit">
                        <h1 class="text-center row-header3">Current Information</h1>
                        <form method="post" action="edit_profile_sec.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="" value="<?php echo $secretary ?>"/>
                                <input type="text" class="form-control" name="email" placeholder="Email Address" required="" value="<?php echo $email ?>" />
                                <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id">
                                <input type="hidden" value="<?php echo $secretary_id ?>" name="secretary_id">
                                <label>Change Status of Dr. <?php echo $doctor_row['doctor_name']?></label>
                                <select name="doctor_status" class="form-control">
                                    <option value="In">In</option>
                                    <option value="Out">Out</option>
                                    <option value="Break">Break</option>
                                </select>
                                <input class="btn btn-default btn-noborder black-btn" type="submit" value="Submit" name="submit"/>
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