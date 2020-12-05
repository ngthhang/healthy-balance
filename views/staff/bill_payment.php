<?php
if (!isset($_GET['id_course'])) {
    redirect('index.php?controller=home&action=bill');
} else {
    $id_course = $_GET['id_course'];
    $course = Course::getCourseById($id_course);
    if (is_null($course->discount) || $course->discount == '' || $course->discount == 0) {
        $fee = number_format($course->price);
    } else {
        $fee = number_format($course->price - ($course->discount) * ($course->price) / 100);
    }
}
if (isset($_POST['makePayment'])) {
    Bill::addBill($user->id, 1, $id_course, $course->discount, $course->price - ($course->discount) * ($course->price) / 100);
    redirect('index.php?controller=home&action=bill');
}
if (isset($_POST['cancelPayment'])) {
    redirect('index.php?controller=home&action=bill');
}
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700 align-self-start">MAKE A PAYMENT</h5>
    <div class="card bg-white course-info d-flex flex-column rounded col-xl-10 col-md-10 col-lg-10 p-0">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color"></h6>
        <form action="" method="POST">
            <table class="table table-borderless ml-3 my-3">
                <tr>
                    <td class="label">DATE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><?= date('d/m/yy') ?></td>
                </tr>
                <tr>
                    <td class="label">COURSE</td>
                    <td colspan="2" class="pl-4"><?= $course->name ?></td>
                </tr>
                <tr>
                    <td class="label">CUSTOMER INFO</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><?= $user->name ?></td>
                </tr>
                <tr>
                    <td class="label">VISA CARD</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><span class="bluesky-color w-700">
                            <input type="number" class='profile-input col-10 blue-color' placeholder="Enter your visa card number" value="">
                </tr>
                <tr>
                    <td class="label">CVV</td>
                    <td colspan="2" class="blue-color w-600 pl-4">
                        <input type="password" class='profile-input userpassword col-10 w-700' onclick="onFocus()" placeholder='Enter your cvv code' name="userpassword">
                    </td>
                </tr>
                <tr>
                    <td class="label">PRICE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><?= number_format($course->price) ?></td>
                </tr>
                <tr>
                    <td class="label">DISCOUNT</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><?= $course->discount ?></td>
                </tr>
                <tr>
                    <td class="label">TOTAL FEE</td>
                    <td colspan="2" class="red-color w-700 t-18 pl-4"><?= $fee ?></td>
                </tr>
            </table>
            <div class="d-flex flex-row align-items-center justify-content-end w-100">
                <button name='cancelPayment' class='my-3 btn lightgray-bg px-3'>
                    <span class="blue-color w-600">CANCEL</span>
                </button>
                <button name='makePayment' class='my-3 btn red-bg px-3 ml-3 mr-4'>
                    <span class="text-white w-600">MAKE PAYMENT</span>
                </button>
            </div>
        </form>
    </div>
</div>