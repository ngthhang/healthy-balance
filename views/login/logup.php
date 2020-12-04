<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Healthy&Balance</title>
    <link rel="shortcut icon" href="asset/images/logo_header.svg" />
    <link rel="stylesheet" type="text/css" href="asset/styles/login.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/index.css">
    <script src="asset/scripts/login.js"></script>
</head>
<?php
require_once('config/config.php');
require_once(ROOT . '\models\User.php');

if (isset($_POST['logup'])) {
    header('Content-Type: text/html; charset=UTF-8');

    // get data from logup 
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['usermail']);
    $phone = addslashes($_POST['userphone']);
    $nation = addslashes($_POST['usernation']);
    $birth = addslashes($_POST['birth']);
    $image = addslashes($_POST['userimage']);
    $password = addslashes($_POST['userpassword']);

    //hash password 
    $password = md5($password);

    //check if user have account in db
    $check_exist = User::checkUserExist($email);
    if ($check_exist) {
        echo "<script>alert('This email have already registered')</script>";
    } else {
        //add new user to db
        $username = str_replace('@gmail.com', '', $email);
        $status = User::addUser($username, $name, $email, $phone, $nation, $birth, $image, $password);
        if ($status) {
            echo "<script>alert('Sign up successfully!')</script>";
            $_SESSION['email'] = $email;
            redirect('index.php');
        } else {
            echo "<script>alert('Sign up failed, please try again!')</script>";
        }
    }
}
?>

<body>
    <div class='container-fluid p-0 h-100'>
        <div class='row h-100'>
            <img class='col-xl-4 col-md-4' alt='' src='asset/images/landing/logup.png' style='height: 900px' />
            <div class='col-sm-8 col-xl-8 col-12 col-md-8'>

                <form action="" class='p-5 login-form' method="POST" onsubmit="return isInputValid()">
                    <h2 class='font-weight-bold mb-5'>Sign up to <span class='pink-color'>Healthy&Balance</span></h2>
                    <div class="form-group mb-3">
                        <label for="username" class='font-weight-bold'>Your name:</label>
                        <input type="text" class="form-control login-input" id="name" onclick="onFocus()" name="name">
                    </div>
                    <div class="form-group mb-3">
                        <label for="userphone" class='font-weight-bold'>Phone number:</label>
                        <input type="number" class="form-control login-input" id="userphone" onclick="onFocus()" name="userphone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="userphone" class='font-weight-bold'>Birth:</label>
                        <input type="date" class="form-control login-input" id="birth" onclick="onFocus()" name="birth">
                    </div>
                    <div class="form-group mb-3">
                        <label for="useravatar" class='font-weight-bold'>Your Avatar:</label>
                        <input type="text" class="form-control login-input" id="userimage" onclick="onFocus()" name="userimage">
                    </div>
                    <div class="form-group mb-3">
                        <label for="useravatar" class='font-weight-bold'>Your nation:</label>
                        <input type="text" class="form-control login-input" id="usernation" default="Viet Nam" onclick="onFocus()" name="usernation">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class='font-weight-bold'>Email Address:</label>
                        <input type="email" class="form-control login-input" id="usermail" onclick="onFocus()" name="usermail">
                    </div>
                    <div class="form-group">
                        <label for="userpassword" class='font-weight-bold'>Password:</label>
                        <div class='input-group'>
                            <input type="password" class="login-input form-control" id="userpassword" onclick="onFocus()" name="userpassword">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" onclick="showPassword('userpassword')">
                                </div>
                                <span class='input-group-text'>Show Password</span>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?controller=login&action=index" class='mb-3'>Already have account? Signin</a>
                    <p class='error-text pb-3' id='error-message'></p>
                    <button type="submit" name="logup" class=" button btn pink-bg btn-primary w-25 font-weight-bold">Logup</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>