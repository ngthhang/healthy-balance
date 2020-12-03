<div class='col-xl-10 col-md-10 col-lg-10 p-0 mt-5'>
    <form action="" method="POST" onsubmit="return changeUserData()">
        <div class='profile-container'>
            <div class="pb-2">
                <img src='<?= $avatar ?>' alt='avatar' class='img-fluid profile-avatar' />
            </div>
            <span>ngthhang</span>
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
                    <input type="text" class='profile-input useremail col-10' onclick="onFocus()" value="<?= $user->mail ?>" name="useremail">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Birth: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->name ?>" name="username">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Nation: </span>
                    <input type="text" class='profile-input username col-10' onclick="onFocus()" value="<?= $user->name ?>" name="username">
                </div>
                <div class='profile-row'>
                    <span class='profile-input-label col-2'>Password: </span>
                    <input type="password" class='profile-input userpassword col-10' onclick="onFocus()" value="<?= $user->pass ?>" name="userpassword">
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