<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Today
                        <hr />
                    </div>
                    <div class="card-body">
                        <?php if (empty($today)) : ?>
                            <div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100" />
                                <p class="pt-4">You don't have an appointment today.</p>
                            </div>
                        <?php else : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Appointment Id</th>
                                        <th>Patient's Name</th>
                                        <th>Age</th>
                                        <th>Clinic</th>
                                        <th>Appointment Time</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    <?php foreach ($today as $now) : ?>
                                        <tr>
                                            <td>APT<?= $now['id'] ?></td>
                                            <td><img width="28" height="28" src="/assets/img/users/<?= $now['image'] ?>" class="rounded-circle m-r-5"><?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
                                            <td><?= getAge($now['birthday']) ?></td>
                                            <td><?= $now['type'] == 'E-consultation' ? 'N/A' : '' ?></td>
                                            <td><?= date('h:i A', strtotime($now['date'])) ?></td>
                                            <td><?= $now['type'] ?></td>
                                            <td><?= date('M d, Y - h:i A', strtotime($now['created'])) ?></td>
                                            <td><span class="custom-badge status-green"><?= ucwords($now['status']) ?></span></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Reschedule</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Cancel</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Next
                        <hr />
                    </div>
                    <div class="card-body">
                        <?php if (empty($next)) : ?>
                            <div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100" />
                                <p class="pt-4">You don't have an appointment for coming days.</p>
                            </div>
                        <?php else : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Appointment Id</th>
                                        <th>Patient's Name</th>
                                        <th>Age</th>
                                        <th>Clinic</th>
                                        <th>Appointment Date</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    <?php foreach ($next as $now) : ?>
                                        <tr>
                                            <td>APT<?= $now['id'] ?></td>
                                            <td><img width="28" height="28" src="/assets/img/users/<?= $now['image'] ?>" class="rounded-circle m-r-5"><?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
                                            <td><?= getAge($now['birthday']) ?></td>
                                            <td><?= $now['type'] == 'E-consultation' ? 'N/A' : '' ?></td>
                                            <td><?= date('M d, Y - h:i A', strtotime($now['date'])) ?></td>
                                            <td><?= $now['type'] ?></td>
                                            <td><?= date('M d, Y - h:i A', strtotime($now['created'])) ?></td>
                                            <td><span class="custom-badge <?php if($now['status'] == 'pending') echo 'status-orange'; elseif($now['status'] == 'approved') echo 'status-green'; else echo 'status-red';  ?>"><?= ucwords($now['status']) ?></span></td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-check m-r-5"></i> Approve</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Cancel</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        History
                        <hr />
                    </div>
                    <div class="card-body">
                        <?php if (empty($history)) : ?>
                            <div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100" />
                                <p class="pt-4">You don't have an appointment history for now.</p>
                            </div>
                        <?php else : ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Patient's Name</th>
                                        <th>Date</th>
                                        <th>Clinic</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach ($history as $now) : ?>
                                        <tr>
                                            <td><?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
                                            <td><?= date('M d, Y', strtotime($now['date'])) ?></td>
                                            <td><?= $now['clinicId'] ?></td>
                                            <td><?= $now['type'] ?></td>
                                            <td><?= date('Y-m-d H:i:s', strtotime($now['created'])) ?></td>
                                            <td><?= $now['status'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>