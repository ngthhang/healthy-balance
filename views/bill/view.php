<?php
if (!isset($_GET['id_bill'])) {
    echo "<script>alert('Mail id is not exist!')</script>";
    redirect('index.php?controller=home&action=bill');
} else {
    $bill = Bill::getBillById($_GET['id_bill']);
    $user_name = User::getUserById($user->id)->name;
    $course = Course::getCourseById($bill->course_id);
}
?>
<div class="d-flex flex-column align-items-start justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700">BILL <?= $bill->id ?></h5>
    <div class="card bg-white course-info d-flex flex-column align-self-center rounded w-75 p-0">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color">Bill Detail</h6>
        <table class="table table-borderless ml-3 my-3">
            <tr>
                <td class="label1">DATE</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= date("d/m/yy", strtotime($bill->date)) ?></td>
            </tr>
            <tr>
                <td class="label1">ID</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $bill->id ?></td>
            </tr>
            <tr>
                <td class="label1">COURSE</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $course->name ?></td>
            </tr>
            <tr>
                <td class="label1">CUSTOMER INFO</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user_name ?></td>
            </tr>
            <tr>
                <td class="label1">DISCOUNT</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $bill->discount ?></td>
            </tr>
            <tr>
                <td class="label1">TOTAL FEE</td>
                <td colspan="2" class="red-color w-600 t-20 pl-4"><?= $bill->fee ?></td>
            </tr>
        </table>
    </div>
    <form action="index.php" class="my-5 mr-5 w-700 align-self-end" name='return' method='GET'>
        <input type="text" name="controller" value="home" id='controller' style="display: none">
        <input type="text" name="action" value="bill" id='action' style="display: none">
        <button class="px-5 btn blue-bg text-white">RETURN</button>
    </form>
</div>