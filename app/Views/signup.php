<!-- Content -->
<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <form id="doctorRegistrationForm" class="form-signin" method="post" autocomplete="off">
                <div class="mt-5">
                    <strong class="text-primary">Account Details</strong>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Firstname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="firstName" id="firstName">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Middlename</label>
                            <input type="text" class="form-control" name="middleName" id="middleName">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Lastname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="lastName" id="lastName">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Suffix</label>
                            <input type="text" class="form-control" name="suffix" id="suffix">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>PRC License No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="prcLicense" id="prcLicense">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>PTR No.</label>
                            <input type="text" class="form-control" name="ptrNo" id="ptrNo">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>S2 License No.</label>
                            <input type="text" class="form-control" name="s2License" id="s2License">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Specialty / Practices <span class="text-danger">*</span></label>
                            <select class="form-control select" name="specialty[]" id="specialty" multiple="multiple">
                                <?php foreach ($specialties as $specialty) : ?>
                                    <option value="<?= $specialty ?>"><?= $specialty ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="gender" id="gender">
                                <option value="">-</option>
                                <?php foreach ($genders as $gender) : ?>
                                    <option value="<?= $gender ?>"><?= $gender ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Mobile No. <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mobile" id="mobile">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="confirm_password2" id="confirm_password2">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Birthday <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="birthday" id="birthday">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>PRC ID <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="prcId" id="prcId">
                                <label class="custom-file-label" for="prcId"></label>
                            </div>
                            <div id="preview1">
                                <img id="prcIdPreview">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>E-Signature <span class="text-danger">*</span></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="signature" id="signature">
                                <label class="custom-file-label" for="signature"></label>
                            </div>
                            <div id="preview2">
                                <img id="signaturePreview">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <strong class="text-primary">Address Details</strong>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Province <span class="text-danger">*</span></label>
                            <select class="form-control select" name="province" id="province" style="border: 1px solid blue !important;">
                                <option value="" hidden>-</option>
                                <?php foreach ($provinces as $province) : ?>
                                    <option value="<?= $province['provinceId'] ?>"><?= ucfirst(strtolower($province['name'])) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>City / Municipal <span class="text-danger">*</span></label>
                            <select class="form-control select" name="city" id="city">
                                <option value="" hidden>-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Barangay <span class="text-danger">*</span></label>
                            <select class="form-control select" name="barangay" id="barangay">
                                <option value="" hidden>-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Street Name / Street # <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="street" id="street">
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <strong class="text-primary">Bank Details</strong>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Bank <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="bank">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Account Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="accountname">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Account Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="accountnumber">
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <strong class="text-primary">Service Charge</strong>
                </div>
                <hr />
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7 col-sm-12">
                        <div class="form-group">
                            <label>Service Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="service">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <div class="form-group">
                            <label>Amount <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="amount">
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-15">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="agree" name="agree">
                        <label class="custom-control-label" for="agree">I have carefully reviewed the personal data that I have entered. I understand that after I click Submit to complete my registration, I will no longer be allowed to edit my first name, last name and birthday.
                            and I agree the <a href="#">Terms & Condition</a> and <a href="#">Privacy Policy</a>.
                        </label>
                    </div>
                </div>
                <div class="form-group text-center mt-5">
                    <input type="hidden" name="action" id="action" value="Add">
                    <button type="submit" id="submitDoctorRegistrationForm" class="btn btn-primary account-btn"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="btn-txt">Submit</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Content /-->