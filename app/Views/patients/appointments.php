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
                                        <th>Doctor Name</th>
                                        <th>Clinic</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach ($today as $now) : ?>
                                        <tr>
                                            <td>Dr. <?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
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
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Clinic</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach ($next as $now) : ?>
                                        <tr>
                                            <td>Dr. <?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
                                            <td><?= date('M d, Y H:i', strtotime($now['date'])) ?></td>
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
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Clinic</th>
                                        <th>Type</th>
                                        <th>Date Booked</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach ($history as $now) : ?>
                                        <tr>
                                            <td>Dr. <?= $now['firstName'] . ' ' . $now['lastName'] ?></td>
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