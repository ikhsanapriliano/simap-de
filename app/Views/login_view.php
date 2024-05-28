<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A600" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A600" />
    <link rel="stylesheet" href="aset/css/login.css">

</head>

<body class="d-flex justify-content-center align-items-center" style="background-color: white; height: 100vh;">
    <?php $errors = session()->getFlashdata('errors') ?>
    <?php $notFound = session()->getFlashdata('notFound') ?>
    <?php $wrongPassword = session()->getFlashdata('wrongPassword') ?>
    <div class="d-flex justify-content-start desktop-1-pBR" style="padding: 50px; width: 80%; height: 90%">
        <div class="group-1-Eyu flex-column" style="width: 60%; overflow: hidden;">
            <img src="aset/img/background-login.gif" style="width: 600px; height:400px;" />
            <h6 style="font-weight: bold;"> Creating Wonders Through Innovative Mechanical Design</h6>
            <p style="font-weight: 100; font-size: 10px; " class="text-center">
                Welcome to
                SIMAP-DE, where
                expertise
                meets innovation
                to craft
                stunning
                mechanical
                solutions.
                Our team of dedicated professionals is committed to designing and developing mechanical systems
                that
                are
                not only efficient and reliable but also deliver exceptional aesthetic and functional value.</p>
        </div>
        <div style="margin-left: 20px; padding-left:55px">
            <img src="aset/img/logo/polman.png" class="mb-3" style="width: 150px;" />
            <?php if(!empty($notFound)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $notFound ?>
            </div>
            <?php endif ?>
            <?php if(!empty($wrongPassword)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $wrongPassword ?>
            </div>
            <?php endif ?>
            <h5>
                <p class="login-disini-vjZ">LOGIN</p>
            </h5>
            <form action="/login" method="post">
                <div class="form-group has-validation">
                    <input type="text" placeholder="username*" name="username"
                        class="form-control <?= !empty($errors['username']) ? 'is-invalid' : '' ?>"
                        id="validationServerUsername"
                        aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        <?= !empty($errors['username']) ? $errors['username'] : '' ?>
                    </div>
                </div>
                <div class="form-group has-validation">
                    <input type="password" placeholder="password*" name="password"
                        class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>"
                        id="validationServerPassword"
                        aria-describedby="inputGroupPrepend3 validationServerPasswordFeedback" required>
                    <div id="validationServerPasswordFeedback" class="invalid-feedback">
                        <?= !empty($errors['password']) ? $errors['password'] : '' ?>
                    </div>
                </div>
                <div class="form-btn">
                    <input value="submit" type="submit" name="login" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</body>

</html>