<div class="modal fade bs-remarks-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-input"  method="post" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Remarks</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="input-group">
                                <textarea class="form-control" rows="3"></textarea>
                                <input class="btn btn-default login-btn btn-noborder" type="submit" value="Submit" name="submit"/>
                            </div>

                        </div>
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