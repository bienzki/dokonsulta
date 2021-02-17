<div class="page-wrapper">
    <div class="content">
        <div class="container">
            <div class="card card-profile half mb-30">
                <div class="card-header">
                    <div class="text-right">
                        <button class="btn btn-primary-two btn-edit" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-pencil"></i></button>
                    </div>
                    <div class="col-12 text-center"><img src="/assets/img/users/<?= session()->get('image') ?>" class="rounded-circle img-thumbnail" width="100" />
                        <h3 class="pt-4"><?= session()->get('firstName') . ' ' . session()->get('middleName') . ' ' . session()->get('lastName') . ' ' . session()->get('suffix') ?></h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>First Name</h6>
                                <p><?= session()->get('firstName') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Middle Name</h6>
                                <p><?= session()->get('middleName') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Last Name</h6>
                                <p><?= session()->get('lastName') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Suffix</h6>
                                <p><?= session()->get('suffix') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Age</h6>
                                <p><?= getAge(session()->get('birthday')) ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Date of Birth</h6>
                                <p><?= date('F d, Y', strtotime(session()->get('birthday'))) ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Place of Birth</h6>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Gender</h6>
                                <p><?= session()->get('gender') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Blood Type</h6>
                                <p><?= session()->get('bloodType') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Marital Status</h6>
                                <p><?= session()->get('civilStatus') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Mobile</h6>
                                <p><?= session()->get('mobile') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Telephone</h6>
                                <p><?= $patient['telephone'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Email</h6>
                                <p><?= session()->get('email') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Occupation</h6>
                                <p><?= $patient['occupation'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Company</h6>
                                <p><?= $patient['company'] ?></p>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Residential Address</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="w-line">
                                <h6>House No. / Street / Subdivision / Building</h6>
                                <p><?= session()->get('street') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Barangay</h6>
                                <p><?= session()->get('barangay') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>City</h6>
                                <p><?= session()->get('city') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Province</h6>
                                <p><?= session()->get('province') ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Zip Code</h6>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Parent's Detail</h4>
                    <div class="row">
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Father's Name</h6>
                                <p><?= $patient['father'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Father's Occupation</h6>
                                <p><?= $patient['fatherOcc'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Mother's Name</h6>
                                <p><?= $patient['mother'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="w-line">
                                <h6>Mother's Occupation</h6>
                                <p><?= $patient['motherOcc'] ?></p>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Patient Medical History</h4>
                    <div class="row">
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>Drug Allergies</h6>
                                <p><?= $patient['drugAllergy'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>Food Allergies</h6>
                                <p><?= $patient['foodAllergy'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>Past and current medications, for what condition?</h6>
                                <p><?= $patient['medications'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>History of surgery, procedure and when</h6>
                                <p><?= $patient['historySurgery'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>History of hospitalisation, procedure and when</h6>
                                <p><?= $patient['historyHospital'] ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="w-line">
                                <h6>Any diagnosed medical condition?</h6>
                                <p><?= $patient['diagnose'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="fa fa-edit"></i> Edit Profile</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="<?= session()->get('firstName') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" id="middleName" name="middleName" value="<?= session()->get('middleName') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="<?= session()->get('lastName') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Suffix</label>
                                <input type="text" class="form-control" id="suffix" name="suffix" value="<?= session()->get('suffix') ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="<?= getAge(session()->get('birthday')) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" value="<?= date('F d, Y', strtotime(session()->get('birthday'))) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Place of Birth</label>
                                <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth" value="">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <label>Gender</label>
                            <div class="form-group custom-select">
                                <select id="gender" name="gender">
                                    <option value="">-</option>
                                    <option value="1" <?= session()->get('gender') == 'Male' ? 'selected' : '' ?>>Male</option>
                                    <option value="2" <?= session()->get('gender') == 'Female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Blood Type</label>
                                <input type="text" class="form-control" id="bloodType" name="bloodType" value="<?= session()->get('bloodType') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <input type="text" class="form-control" id="civilStatus" name="civilStatus" value="<?= session()->get('civilStatus') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?= session()->get('mobile') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="<?= $patient['telephone'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= session()->get('email') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation" value="<?= $patient['occupation'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="<?= $patient['company'] ?>">
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Residential Address</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>House No. / Street / Subdivision / Building</label>
                                <input type="text" class="form-control" id="street" name="street" value="<?= session()->get('street') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay" value="<?= session()->get('barangay') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?= session()->get('city') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Province</label>
                                <input type="text" class="form-control" id="province" name="province" value="<?= session()->get('province') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 col-lg-4 col-md-4 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" value="">
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Parent's Detail</h4>
                    <div class="row">
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Father's Name</label>
                                <input type="text" class="form-control" id="father" name="father" value="<?= $patient['father'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Father's Occupation</label>
                                <input type="text" class="form-control" id="fatherOcc" name="fatherOcc" value="<?= $patient['fatherOcc'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Mother's Name</label>
                                <input type="text" class="form-control" id="mother" name="mother" value="<?= $patient['mother'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 pt-4">
                            <div class="form-group">
                                <label>Mother's Occupation</label>
                                <input type="text" class="form-control" id="motherOcc" name="motherOcc" value="<?= $patient['motherOcc'] ?>">
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title pt-5">Patient Medical History</h4>
                    <div class="row">
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>Drug Allergies</label>
                                <input type="text" class="form-control" id="drugAllergy" name="drugAllergy" value="<?= $patient['drugAllergy'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>Food Allergies</label>
                                <input type="text" class="form-control" id="foodAllergy" name="foodAllergy" value="<?= $patient['foodAllergy'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>Past and current medications, for what condition?</label>
                                <input type="text" class="form-control" id="medications" name="medications" value="<?= $patient['medications'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>History of surgery, procedure and when</label>
                                <input type="text" class="form-control" id="historySurgery" name="historySurgery" value="<?= $patient['historySurgery'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>History of hospitalisation, procedure and when</label>
                                <input type="text" class="form-control" id="historyHospital" name="historyHospital" value="<?= $patient['historyHospital'] ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 pt-4">
                            <div class="form-group">
                                <label>Any diagnosed medical condition?</label>
                                <input type="text" class="form-control" id="diagnose" name="diagnose" value="<?= $patient['diagnose'] ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>