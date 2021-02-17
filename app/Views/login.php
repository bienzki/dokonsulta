<!-- Content -->
<div class="main-content account-content">
    <div class="content">
        <div class="container pt-5">
            <div class="account-box">
                <form class="form-signin" id="loginForm">
                    <div class="account-title">
                        <h3>Login</h3>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group text-center">
                        <input type="hidden" name="action" id="action" value="Add">
                        <button type="submit" id="submitloginForm" class="btn btn-primary account-btn"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="btn-txt">Login</span></button>
                    </div>
                    <div class="float-right">
                        <a href="" data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</a>
                    </div>
                    <div class="text-left">
                        <a href="" data-toggle="modal" data-target="#resendModal">Resend Verification?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Content /-->

<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-lock"></i> Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    Enter your email address below and we willl send you an instruction to reset your password.

                    <form class="form-signin" id="forgotPasswordForm" autocomplete="off">
                        <div class="form-group pt-4">
                            <label for="">Email address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group text-center pt-3">
                            <button type="submit" id="submitForgotPassword" class="btn btn-primary account-btn"><i class="loading-icons fa fa-spinner fa-spin hide"></i> <span class="btn-txts">Reset Password</span></button>
                        </div>
                    </form>

                    <div class="text-center pt-3">
                        Just remembered? <a href="" data-dismiss="modal" aria-label="Close">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resendModal" tabindex="-1" role="dialog" aria-labelledby="resendModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-send"></i> Resend Verification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    Enter your email address and we will resend you an email verification link.

                    <form class="form-signin" id="resendForm" autocomplete="off">
                        <div class="form-group pt-4">
                            <label for="">Email address</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group text-center pt-3">
                            <button type="submit" id="submitResendForm" class="btn btn-primary account-btn"><i class="loading-icons fa fa-spinner fa-spin hide"></i> <span class="btn-txts">Verify Email</span></button>
                        </div>
                    </form>

                    <div class="text-center pt-3">
                        Already got the confirmation email? <a href="" data-dismiss="modal" aria-label="Close">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>