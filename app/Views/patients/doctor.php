<div class="page-wrapper">
    <div class="content">
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="/assets/img/users/<?= $doctor['image'] ?>" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 m-b-0">Dr. <?= $doctor['firstName'] . ' ' . $doctor['lastName'] ?></h3>
                                        <div class="staff-id"><?= $doctor['specialty'] ?></div>
                                        <div class="staff-msg">
                                            <button onclick="window.location.href='/patients/book/<?= $doctor['slug'] ?>'" title="Book Now" class="btn btn-primary-two btn-edit"><i class="fa fa-calendar"></i></button>
                                            <?php 
                                            $counter = 0;    
                                            foreach($favorites as $favorite) {
                                                if($favorite['doctorId'] == $doctor['id']){
                                                    $counter++;
                                                }
                                            } ?>
                                            <?php if($counter == 0): ?>
                                                <button class="btn btn-primary-two btn-edit" id="favorite" title="Add To Favorite"><i class="fa fa-heart"></i></button>
                                                <input type="hidden" id="doctorId" value="<?= $doctor['id'] ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href=""><?= $doctor['mobile'] ?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href=""><?= $doctor['email'] ?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text"><?= $doctor['birthday'] ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text"><?= $doctor['barangay'] . ', ' . $doctor['city'] . ', ' . $doctor['province'] ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text"><?= $doctor['gender'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="about-cont">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">Education Informations</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">International College of Medical Science (UG)</a>
                                                    <div>MBBS</div>
                                                    <span class="time">2001 - 2003</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">International College of Medical Science (PG)</a>
                                                    <div>MD - Obstetrics & Gynaecology</div>
                                                    <span class="time">1997 - 2001</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-box m-b-0">
                                <h3 class="card-title">Experience</h3>
                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                                    <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                                    <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a href="#/" class="name">Consultant Gynecologist</a>
                                                    <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab2">
                    Tab content 2
                </div>
                <div class="tab-pane" id="bottom-tab3">
                    Tab content 3
                </div>
            </div>
        </div>
    </div>