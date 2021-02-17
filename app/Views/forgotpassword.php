<!-- Content -->
<div class="main-content account-content">
    <div class="content">
        <div class="container pt-5">
            <div class="account-box">
                <form class="form-signin" id="changePasswordForm">
                    <div class="account-title">
                        <h3>Set New Password</h3>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="password" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password3" id="confirm_password3">
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="action" id="action" value="Add">
                        <input type="hidden" name="token" value="<?= $token ?>">
                        <button type="submit" id="submitChangePasswordForm" class="btn btn-primary account-btn"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="btn-txt">Submit</span></button>
                    </div>
                    <div class="text-center register-link">
                        <a href="/login">Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content /-->