<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="main-title">Create an account</div>
            <div class="row justify-content-md-center">
                <div class="col-md-8 offset-md-4 login-cstm">
                    <div class="row justify-content-md-center" id="signup_one">
                        <div class="col-md-6">
                            <label>First name</label>
                            <input type="text" class="form-control" placeholder="" id="txt_fname" />
                        </div>
                        <div class="col-md-6">
                            <label>Last name</label>
                            <input type="text" class="form-control" placeholder="" id="txt_lname" />
                        </div>
                        <div class="col-md-12">
                            <label>Email address</label>
                            <input type="text" class="form-control" placeholder="" id="txt_email" />
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="" id="txt_pword" />
                        </div>
                        <div class="col-md-6">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" placeholder="" id="txt_confirm_pword" />
                        </div>
                        <div class="col-md-6">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" placeholder="" id="txt_contact" maxlength="11" />
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" class="form-control" placeholder="" id="txt_address" />
                        </div>
                        <div class="col-md-12 padding-top-normal">
                            <button class="btn btn-default" id="btn_signup">Submit</button>
                        </div>
                    </div>
                    <div class="row justify-content-md-center" id="signup_two">
                        <div class="col-md-12 text-center verification_message">
                            <div>We have sent you an access code</div>
                            <div>via Email for Email verification.</div>
                        </div>

                        <div class="col-md-12">
                            <div class="verification_label">Enter code here</div>
                            <center>
                                <input type="text" class="form-control verification_textbox" placeholder="" id="txt_verification" maxlength="10" />
                            </center>
                        </div>
                        <div class="col-md-12 padding-top-normal">
                            <button class="btn btn-default" id="btn_submit_verification">Submit</button>
                        </div>
                    </div>
                    <div class="row justify-content-md-center" id="signup_three">
                        <div class="col-md-12 text-center">
                            <img class="img-responsive" src="<?php echo base_url(); ?>public/img/success.png" />
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="signup_success_title">Registration Success</div>
                            <div class="signup_success_message">
                                Thank you for signup! You can now use your account!
                            </div>
                        </div>

                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12 padding-top-normal text-center">
                            <a href="<?php echo base_url(); ?>login">Proceed to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>