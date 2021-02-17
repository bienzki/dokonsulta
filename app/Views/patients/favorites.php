<div class="page-wrapper">
    <div class="content">
        <?php if (!empty($doctors)) : ?>
            <div class="row doctors-list pt-4">
                <?php $counter = 0;
                foreach ($doctors as $doctor) : ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 col-xl-6 animate__animated animate__fadeInUp">
                        <div class="dash-widget2">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-7 col-lg-7 col-md-7">
                                    <span class="dash-widget-icon">
                                        <a href="/patients/doctor/<?= $doctor['slug'] ?>"><img alt="" src="/assets/img/users/<?= $doctor['image'] ?>"></a>
                                    </span>
                                    <div class="dash-widget-info" style="position: relative; margin-left: 100px; margin-top: 20px;">
                                        <h4 class="doctor-name text-ellipsis"><a href="/patients/doctor/<?= $doctor['slug'] ?>">Dr. <?= $doctor['firstName'] ?> <?= $doctor['lastName'] ?></a></h4>
                                        <div class="doc-prof"><?= $doctor['specialty'] ?></div>
                                        <div class="user-country">
                                            <i class="fa fa-map-marker"></i> <?= $doctor['city'] ?>, <?= $doctor['province'] ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-5">
                                    <div class="doctor-button">
                                        <button class="btn btn-primary btn-primary-two btn-sm book-button" onclick="window.location.href = '/patients/book/<?= $doctor['slug'] ?>'">Book</button>
                                        <button class="btn btn-danger btn-primary-four btn-sm remove" data-toggle="modal" data-target="#removeFavorite<?= $counter ?>">Remove</button>
                                        <input type="hidden" class="favoriteId" value="<?= $doctor['favoriteId'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="removeFavorite<?= $counter ?>" class="modal fade delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <img src="/assets/img/sent.png" alt="" width="50" height="46">
                                    <h3>Remove Dr. <?= $doctor['firstName'] . ' ' . $doctor['lastName'] ?> as your favorite?</h3>
                                    <div class="m-t-20">
                                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                        <button type="submit" class="btn btn-danger" onclick="window.location.href='/patients/deleteFavorite/<?= $doctor['favoriteId'] ?>'">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $counter++;
                endforeach; ?>
            </div>
        <?php else : ?>
            <div class="col-12 text-center animate__animated animate__zoomIn"><img src="/assets-blue/img/doctor.png" class="rounded-circle img-thumbnail" width="100" />
                <h4 class="pt-4">No Favorite Doctors Yet!</h4>
                <p>Once you favorite a Doctor, you'll see them here.</p>
            </div>
        <?php endif; ?>
    </div>
</div>