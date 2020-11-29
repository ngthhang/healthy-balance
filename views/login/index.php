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
    <link rel="shortcut icon" href="asset/images/icons/logo.png" />
    <link rel="stylesheet" type="text/css" href="asset/styles/login.css">
    <link rel="stylesheet" type="text/css" href="asset/styles/index.css">
    <script src="asset/scripts/login.js"></script>
</head>
<?php
// require_once('config/config.php');
// require_once(ROOT . '\models\User.php');
// if (isset($_POST['login'])) {
//     $usermail = addslashes($_POST['email']);
//     $password = addslashes(md5($_POST['pwd']));

//     if (User::checkBlockUser($usermail)) {
//         echo "<script>alert('This Email blocked by admin')</script>";
//     } else if (User::checkUserExist($usermail)) {
//         if (User::checkLogin($usermail, $password)) {
//             $_SESSION['email'] = $usermail;
//             redirect('index.php');
//         } else {
//             echo "<script>alert('Password is not correct, please try again')</script>";
//         }
//     } else {
//         echo "<script>alert('Email is not exist in database, please try again')</script>";
//     }
// }
?>

<body>
    <div class='container-fluid p-0 overflow-hidden'>
        <div class='row h-100'>
            <img src="./asset/images/landing/login.png" alt="" class='col-xl-4 col-md-4'>
            <div class='col-sm-8 col-xl-8 col-12 col-md-8 mt-5'> 
                <form action="" method="POST" onsubmit="return isInputLoginValid()" class='p-5 mt-5 login-form'>
                    <h2 class='font-weight-bold mb-5'>Sign in to <span class="pink-color">healthy&balance</span></h2>
                    <div class="form-group mb-3">
                        <label for="email" class='font-weight-bold'>Email Address:</label>
                        <input type="email" class="form-control login-input" id="email" onclick="onFocus()" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd" class='font-weight-bold'>Password:</label>
                        <div class='input-group'>
                            <input type="password" class="login-input form-control" id="pwd" onclick="onFocus()" name="pwd">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <input type="checkbox" onclick="showPassword('pwd')">
                                </div>
                                <span class='input-group-text'>Show Password</span>
                            </div>
                        </div>
                    </div>
                    <a href="index.php?controller=login&action=login_staff" class=''>Signin as staff</a>
                    <a href="index.php?controller=login&action=logup" class='mb-3'>Not have account? Signup</a>
                    <div>
                        <p class='mb-3 error-text' id='error-message'></p>
                    </div>
                    <button type="submit" name="login" class=" button btn btn-primary pink-bg w-25 font-weight-bold">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>