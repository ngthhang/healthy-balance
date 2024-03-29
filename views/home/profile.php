<?php
    if(isset($_POST['save'])){
        $name = addslashes($_POST['username']);
        $email = addslashes($_POST['useremail']);
        $username = str_replace('@gmail.com', '', $email);
        $usernation = addslashes($_POST['usernation']);
        $userbirth = addslashes($_POST['userbirth']);
        $phone = addslashes($_POST['userphone']);
        $password = addslashes($_POST['userpassword']);
        $password = md5($password);

        if ($email !== $user->email) {
            //check if user have account in db
            $check_exist = User::checkUserExist($email);
            if ($check_exist) {
                echo "<script>alert('This email have already registered, cant change information!')</script>";
                redirect('index.php?controller=home&action=index');
            }
        }
        User::changeUserInfo($user->id, $username, $name, $email, $phone,$usernation, $userbirth, $user->image, $password);
        redirect('index.php?controller=home&action=profile');
    }
?>
<div class='col-xl-10 col-md-10 col-lg-10 p-0 mt-5'>
    <form action="" method="POST" onsubmit="return changeUserData()">
        <div class='profile-container'>
            <div class="pb-2">
                <img src='<?= $image ?>' alt='avatar' class='img-fluid profile-avatar' />
            </div>
            <span><?= $current_user ?></span>
            <div class='profile-info-container'>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Id: </span>
                    <input type="text" class='profile-input col-10' disabled value="<?= $user->id ?>" name="id">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Name: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->name ?>" name="username">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Phone: </span>
                    <input type="text" class='profile-input userphone col-10' onclick="onFocus()" value="<?= $user->phone ?>" name="userphone">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Email: </span>
                    <input type="text" class='profile-input useremail col-10' onclick="onFocus()" value="<?= $user->email ?>" name="useremail">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Birth: </span>
                    <input type="date" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->birth ?>" name="userbirth">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Nation: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->nation ?>" name="usernation">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Password: </span>
                    <input type="password" class='profile-input userpassword col-10' onclick="onFocus()" value="<?= $user->password ?>" name="userpassword">
                </div>
                <div class='profile-row'>
                    <p id='error-message' class='ml-3 error-text'></p>
                </div>
                <div class='mt-3 align-self-end'>
                    <button type="submit" name="save" class="mr-2 button btn btn-primary profile-save-btn font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>