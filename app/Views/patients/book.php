<div class="page-wrapper">
    <div class="content">
        <div class="account-box">
            <div class="doctor-img">
                <a class="avatar" href="/patients/doctor/<?= $doctor['slug'] ?>"><img alt="" src="/assets/img/users/<?= $doctor['image'] ?>"></a>
            </div>
            <h4 class="doctor-name text-ellipsis text-center"><a href="/patients/doctor/<?= $doctor['slug'] ?>">Dr. <?= $doctor['firstName'] ?> <?= $doctor['lastName'] ?></a></h4>
            <div class="doc-prof text-center"><?= $doctor['specialty'] ?></div>
            <hr />
            Choose type of appointment.
            <div class="p-3">
                <button class="btn btn-primary btn-type btn-active btn-sm" id="eConsult">E-Consultation</button>
                <button class="btn btn-primary btn-type btn-sm" id="clinicVisit">Clinic Visit</button>
            </div>
            <form class="pt-4" id="appointmentForm" autocomplete="off">
                <div class="hide" id="clinicDiv">
                    <label>Clinic <span class="text-danger">*</span></label>
                    <div class="form-group custom-select">
                        <select id="clinic" name="clinic">
                            <option value="a1">-</option>
                            <option value="1">Doctor Wong Clinic</option>
                            <option value="2">Veteran Clinic</option>
                            <option value="3">Yes Clinic</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Date <span class="text-danger">*</span></label>
                    <input type="text" class="form-control datetimepicker" id="date" name="date">
                </div>
                <div class="form-group">
                    <label>Describe problems <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="problem" name="problem">
                </div>
                <div class="form-group">
                    <label>When did it start? <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="problemStart" name="problemStart">
                </div>
                <div class="form-group">
                    <label>Medications you are currently taking, if any?</label>
                    <textarea type="text" class="form-control" name="medication"></textarea>
                </div>
                <div class="form-group">
                    <label>Drug and food allergies, if any?</label>
                    <textarea type="text" class="form-control" rows="2" name="allergy"></textarea>
                </div>
                <hr />
                <h5>Vital Signs</h5>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <label>Height</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="height" name="height">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Weight</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="weight" name="weight">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Temperature</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="temperature" name="temperature">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">c</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label>Other information you want your doctor to know.</label>
                    <input type="text" class="form-control" name="info">
                </div>
                <div class="form-group">
                    <label>Attach file that you want to show your doctor</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file"></label>
                        <div class="gallery" style="width: 20%; padding: 10px;"></div>
                    </div>
                </div>
                <div class="custom-control custom-checkbox" id="agreeDiv">
                    <input name="doctorId" value="<?= $doctor['id'] ?>" hidden>
                    <input name="type" id="appointmentType" value="e-consult" hidden>
                    <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                    <label class="custom-control-label" for="agree">By checking the Informed Consent box, I have fully read, understood, and give my full <a href="#">consent</a> to go ahead and perform the E-consult session.
                    </label>
                </div>
                <div class="text-center pt-5">
                    <button type="submit" class="btn btn-primary btn-type" id="submitAppointmentForm"><i class="loading-icon fa fa-spinner fa-spin hide"></i> <span class="btn-txt">Submit</span></button>
                    <button type="button" class="btn btn-secondary btn-type" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>