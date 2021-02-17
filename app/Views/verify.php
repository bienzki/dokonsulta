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

</head>

<body>
    <div class="container">
        <div class="card text-center" style="margin-top: 100px">
            <div class="card-header" style="background: #fff;">
                <img alt="Logo" src="/assets-blue/img/logo.png">
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <h2 class="card-title">Welcome <?= $firstName ?></h2>
                    <h6 class="card-text" >You've successfully verified your account to our system. And we're so excited to have you as our newest friend!</h6>
                    <br />
                    <h6 class="card-text">We'll be in touch soon, but in the meantime why don't you customize your pofile and browse around our site a bit more? There's plenty of useful tools & tips to get you started!</h6>
                    <br />
                    <a href="/login" class="btn btn-primary">Let's Get Started!</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>