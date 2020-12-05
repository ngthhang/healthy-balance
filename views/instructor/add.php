<?php
if (isset($_POST['addPT'])) {
    $name = addslashes($_POST['name']);
    $phone = addslashes($_POST['phone']);
    $email = addslashes($_POST['email']);
    $birth = addslashes($_POST['birth']);
    $nation = addslashes($_POST['nation']);
    $image = addslashes($_POST['image']);
    $description = addslashes($_POST['description']);
    $password = md5('123456');
    if (strpos($email, '@gmail.com') == false) {
        echo "<script>alert('Email is not valid')</script>";
        redirect('index.php?controller=instructor&action=add');
    } else if(Staff::checkStaffExist($email)){
        echo "<script>alert('Email exist in database')</script>";
        redirect('index.php?controller=instructor&action=add');
    } else{
        if($image == 0 || is_null($image) || $image == ''){
            $image = 'default';
        }
        $image = 'asset/images/staffs/' . $image . '.svg';
        Staff::addStaff(2,$name,$email,$phone,$nation,$birth,$image,$description,$password);
        redirect('index.php?controller=staff&action=instructor');
    }
}
if (isset($_POST['cancelAddCourse'])) {
    redirect('index.php?controller=staff&action=instructor');
}
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700 align-self-start">ADD INSTRUCTOR</h5>
    <div class="card bg-white course-info d-flex flex-column rounded col-xl-10 col-md-10 col-lg-10 p-0 mb-5">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color"></h6>
        <form action="" method="POST">
            <table class="table table-borderless ml-3 my-3">
                <tr>
                    <td class="label">NAME</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter instructor name" type="text" class='profile-input col-10' name="name"></td>
                </tr>
                <tr>
                    <td class="label">PHONE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter instructor phone" type="number" class='profile-input col-10' name="phone"></td>
                </tr>
                <tr>
                    <td class="label">EMAIL</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter instructor email" type="text" class='profile-input col-10' name="email"></td>
                </tr>
                <tr>
                    <td class="label">BIRTH</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input type="date" class='profile-input col-10' name="birth"></td>
                </tr>
                <tr>
                    <td class="label">NATION</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter instructor nation" value="Viet Nam" type="text" class='profile-input col-10' name="nation"></td>
                </tr>
                <tr>
                    <td class="label">IMAGE</td>
                    <td colspan="2" class="blue-color w-600 pl-4">
                        <input placeholder="Enter your select image avatar" type="number" class='profile-input col-10' name="image">
                    </td>
                </tr>
                <tr>
                    <td class="label">DESCRIPTION</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter description" type="text" class='profile-input col-10' name="description"></td>
                </tr>
            </table>
            <div class="d-flex flex-row align-items-center justify-content-end w-100">
                <button name='cancelAddCourse' class='my-3 btn lightgray-bg px-3'>
                    <span class="blue-color w-600">CANCEL</span>
                </button>
                <button name='addPT' class='my-3 btn red-bg px-3 ml-3 mr-4'>
                    <span class="text-white w-600">ADD INSTRUCTOR</span>
                </button>
            </div>
        </form>
    </div>
</div>