<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A600"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A600"/>
    <link rel="stylesheet" href="aset/css/login.css">

</head>
<body>
<div class="group-1-Eyu">
    <div class="desktop-1-pBR">
        <p class="login-disini-vjZ"><h5>REGISTRASI</h5></p>
        <form action="/registration" method="post">
        <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Nama lengkap*">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email*">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password*">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Ulangi Password*">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <br>
        <div><p>Sudah punya akun ? <a href="login">Login</a></p></div>
    </div>
</div>
</body>
</html>
