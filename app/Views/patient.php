<!-- Content -->
<div class="main-content account-content">
    <div class="content">
        <div class="container">
            <form class="form-signin" id="patientRegistrationForm" method="post" autocomplete="off">
                <div class="container mt-5">
                    <div class="alert alert-danger" role="alert">
                        <strong>Note:</strong> If you are a parent or guardian creating an account in behalf of the patient, please make sure to input the PATIENT's information.
                    </div>
                </div>
                <div class="mt-5">
                    <strong class="text-primary">Personal Data</strong>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Firstname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="firstName" id="firstName" autofocus>
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
                            <label>Birthday <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="birthday" id="birthday">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Gender <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="gender" id="gender">
                                <option value="" hidden>-</option>
                                <?php foreach ($genders as $gender) : ?>
                                    <option value="<?= $gender ?>"><?= $gender ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Civil Status <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="civilStatus" id="civilStatus">
                                <option value="" hidden>-</option>
                                <?php foreach ($civilstatuses as $civilstatus) : ?>
                                    <option value="<?= $civilstatus ?>"><?= $civilstatus ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Blood Type</label>
                            <select class="select2" name="bloodType" id="bloodType">
                                <option value="" hidden>-</option>
                                <?php foreach ($bloodtypes as $bloodtype) : ?>
                                    <option value="<?= $bloodtype ?>"><?= $bloodtype ?></option>
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
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email" id="email">
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
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
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
                            <select class="form-control select" name="province" id="province">
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
                    <button type="submit" id="submitPatientRegistrationForm" class="btn btn-primary account-btn"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="btn-txt">Submit</span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Content /-->