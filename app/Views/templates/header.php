<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?= $metaTitle ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets-blue/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets-blue/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets-blue/css/font-awesome.min.css">

    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="/assets-blue/css/owl.carousel.css">
    <link rel="stylesheet" href="/assets-blue/css/owl.theme.default.min.css">

    <!-- Select CSS -->
    <link href="/assets-blue/css/select2.min.css" rel="stylesheet" />
    <link href="/assets-blue/css/select2.bootstrap4.css" rel="stylesheet"> <!-- for live demo page -->

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="/assets-blue/css/daterangepicker.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="/assets-blue/css/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Main Css -->
    <link rel="stylesheet" href="/assets-blue/css/style.css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		<script src="/assets-blue/js/html5shiv.min.js"></script>
		<script src="/assets-blue/js/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <?php $uri = service('uri'); ?>
    <!-- Header -->
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 float-left">
                        <div class="logo">
                            <a href="/"><img alt="Logo" src="/assets-blue/img/logo.png" width="56" height="50"></a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <nav class="navbar navbar-expand-md p-0">
                            <div class="navbar-collapse collapse" id="navbar">
                                <ul class="nav navbar-nav main-nav float-right ml-auto">
                                    <li class="nav-item">
                                        <a href="/#home" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/#about" class="nav-link">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/#doctors" class="nav-link">Doctors</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/#testimonials" class="nav-link">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/#faq" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/#contact" class="nav-link">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-primary appoint-btn nav-link" href="/login">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-primary appoint-btn nav-link" href="" data-toggle="modal" data-target="#signup-modal">Sign Up</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header /-->

    <!-- Mobile Header -->
    <header class="mobile-header">
        <div class="panel-control-left">
            <a class="toggle-menu" href="#side_menu"><i class="fa fa-bars"></i></a>
        </div>
        <div class="page_title">
            <a href="/"><img src="/assets-blue/img/logo.png" alt="Logo" class="img-fluid" width="60" height="60"></a>
        </div>
    </header>
    <!-- Mobile Header /-->

    <!-- Mobile Sidebar -->
    <div class="sidebar sidebar-menu" id="side_menu">
        <div class="sidebar-inner slimscroll">
            <a id="close_menu" href="#"><i class="fa fa-close"></i></a>
            <ul class="mobile-menu-wrapper" style="display: block;">
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#home">Home</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#about">About Us</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#doctors">Doctors</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#testimonials">Testimonials</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#faq">FAQ</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/#contact">Contact</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="/login">Login</a>
                    </div>
                </li>
                <li>
                    <div class="mobile-menu-item clearfix">
                        <a href="" data-toggle="modal" data-target="#signup-modal" id="signup-mobile">Signup</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile Sidebar /-->

    <!-- Modal -->
    <div class="modal fade" id="signup-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h6 class="text-center mb-4">Choose Account Type</h6>
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <a href="/signup">
                                <div class="select-type">
                                    <img src="/assets-blue/img/doctor.png" alt="" width="100%">
                                    <h6>I am a doctor</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-6">
                            <a href="/patient">
                                <div class="select-type">
                                    <img src="/assets-blue/img/patient.png" alt="" width="100%">
                                    <h6>I am a patient</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signup-success">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-check"></i> Registration Success!</h5>
                </div>
                <div class="modal-body">
                    <p>An email was sent to your email address for confirmation.</p>
                    <p>Please check your inbox or spam folder and tag as not spam.</p>
                    <button id="resendEmail" class="btn btn-primary account-btn"><i class="loading-icons fa fa-spinner fa-spin hide"></i> <span class="btn-txts">Resend Email</span></button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary float-right" onclick="window.location.href='/login'">Confirm</button>
                </div>
            </div>
        </div>
    </div>