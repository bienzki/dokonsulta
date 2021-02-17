<!-- Content -->
<div class="main-content">
    <section class="section home-banner row-middle" id="home">
        <div class="inner-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="banner-content">
                        <h1>Expanding Your Access to Healthcare</h1>
                        <p>DoKonsulta helps patients manage their healthcare needs wherever and whenever they need to.</p>
                        <a title="Find A Doctor" class="btn btn-primary consult-btn" href="/doctors">Find A Doctor</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section features" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">About DoKonsulta</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                            nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                            Duis dictum eget dolor vel blandit.</p>
                    </div>
                </div>
            </div>
            <div class="row feature-row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Book an Appointment" src="/assets-blue/img/icon-01.png">
                        </div>
                        <h4>Book an Appointment</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Consult with a Doctor" src="/assets-blue/img/icon-02.png">
                        </div>
                        <h4>Consult with a Doctor</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <img width="60" height="60" alt="Make a family Doctor" src="/assets-blue/img/icon-03.png">
                        </div>
                        <h4>Make a family Doctor</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section meet-doctors" id="doctors">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Meet our Doctors</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                            nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                            Duis dictum eget dolor vel blandit.
                        </p>
                    </div>
                </div>
            </div>
            <div id="our_doctor" class="owl-carousel text-center">
                <?php foreach ($doctors as $doctor) : ?>
                    <div class="item">
                        <div class="doctor text-center">
                            <a href="/doctor/<?= $doctor['slug'] ?>">
                                <img src="/assets/img/users/<?= $doctor['image'] ?>" alt="Dr. <?= $doctor['firstName'] . ' ' . $doctor['lastName'] . ' ' . $doctor['suffix'] ?>" class="rounded-circle" width="150" height="150">
                                <div class="doctors-name">Dr. <?= $doctor['firstName'] . ' ' . $doctor['lastName'] . ' ' . $doctor['suffix'] ?></div>
                                <div class="doctors-position">
                                    <?php $specialties = explode(',', $doctor['specialty']);
                                    $i = 0;
                                    foreach ($specialties as $specialty) :
                                        if (count($specialties) - 2 > $i) {
                                            echo $specialty . ', ';
                                        } else {
                                            echo $specialty;
                                        }
                                        $i++;
                                    endforeach; ?>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="see-all">
                        <a href="/doctors" class="btn btn-primary see-all-btn">See all Doctors</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section testimonials" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Testimonials</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus
                            nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices.
                            Duis dictum eget dolor vel blandit.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="testimonial_slider" class="owl-carousel text-center">
                        <div class="item">
                            <div class="testimonial-list">
                                <div class="testimonial-img">
                                    <img class="img-fluid" src="/assets-blue/img/testi-03.jpg" alt="" width="150" height="150">
                                </div>
                                <div class="testimonial-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <h3 class="testi-user">- Jennifer Robinson</h3>
                                    <span>Leland, USA</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-list">
                                <div class="testimonial-img">
                                    <img class="img-fluid" src="/assets-blue/img/testi-02.jpg" alt="" width="150" height="150">
                                </div>
                                <div class="testimonial-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <h3 class="testi-user">- Denise Stevens</h3>
                                    <span>Abington, USA</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-list">
                                <div class="testimonial-img">
                                    <img class="img-fluid" src="/assets-blue/img/testi-05.jpg" alt="" width="150" height="150">
                                </div>
                                <div class="testimonial-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <h3 class="testi-user">- Charles Ortega</h3>
                                    <span>El Paso, USA</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-list">
                                <div class="testimonial-img">
                                    <img class="img-fluid" src="/assets-blue/img/testi-04.jpg" alt="" width="150" height="150">
                                </div>
                                <div class="testimonial-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <h3 class="testi-user">- Kyle Bowman</h3>
                                    <span>Vero Beach, USA</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-list">
                                <div class="testimonial-img">
                                    <img class="img-fluid" src="/assets-blue/img/testi-01.jpg" alt="" width="150" height="150">
                                </div>
                                <div class="testimonial-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore.
                                    </p>
                                </div>
                                <div class="testimonial-author">
                                    <h3 class="testi-user">- Linda Carpenter</h3>
                                    <span>Tallahassee, USA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header text-center">
                        <h3 class="header-title">Contact Us</h3>
                        <div class="line"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim. Aenean vitae metus in augue pretium ultrices. Duis dictum eget dolor vel blandit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <aside class="col-md-6">
                    <div class="contact-left">
                        <div class="working-hours">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15702.712437596167!2d123.945083!3d10.2874987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xea000bd21bff9c00!2sBien%20Aqua%20(Aqua%20Omandac)!5e0!3m2!1sen!2sph!4v1610504178442!5m2!1sen!2sph" width="100%" height="333" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </aside>
                <div class="col-md-6 map-frame">
                    <form class="form-signin" action="/#contact-form" method="post" autocomplete="off" id="contact-form">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>">
                                    <i class="text-danger"><?= (isset($validation) ? $validation->getError('name') : null) ?></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
                                    <i class="text-danger"><?= (isset($validation) ? $validation->getError('email') : null) ?></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?= set_value('phone') ?>">
                                    <i class="text-danger"><?= (isset($validation) ? $validation->getError('phone') : null) ?></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control" name="subject" value="<?= set_value('subject') ?>">
                                    <i class="text-danger"><?= (isset($validation) ? $validation->getError('subject') : null) ?></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" rows="3" name="message"><?= set_value('message') ?></textarea>
                            <i class="text-danger"><?= (isset($validation) ? $validation->getError('message') : null) ?></i>
                        </div>
                        <div class="form-group text-left">
                            <button class="btn btn-primary account-btn" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Content /-->