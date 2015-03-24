<!-- Modal -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Login</h4>
        </div>
        <div class="modal-body e4e8e9-bg">
            <div class="usr-login">
                <form method="post" action="login.php">
                    <div class="input-group">
                        <input type="text" class="form-control login-field" name="username" placeholder="Username" required>
                        <i class="fa fa-user field-icon"></i>
                    </div>

                    <div class="input-group">
                        <input type="password" class="form-control login-field" name="password" placeholder="Password" required>
                        <i class="fa fa-lock field-icon"></i>
                    </div>

                    <input class="btn btn-default login-btn btn-noborder" type="submit" value="Login" name="login"/>
                </form>
                    <a class="login-link" href="signup.php">Don't have an account?</a>
            </div>
        </div>
    </div>
  </div>
</div>