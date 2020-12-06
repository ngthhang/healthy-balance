<?php
if (isset($_GET['item'])) {
    if (is_null($_GET['item']) || $_GET['item'] == '') {
        echo "<script>alert('Cant fount customer because of invalid searching')";
        redirect('index.php?controller=staff&action=customer');
    } else {
        $item = $_GET['item'];
        if (User::checkUserExist($item)) {
            $user = User::getCurrentUser($item);
            if (is_null($user->image) || $user->image === '') {
                $img = 'asset/images/staffs/default.png';
            } else {
                $img = $user->image;
            }
            $join_course = JoinCourse::getCourseJoinByUser($user->id);
        } else if(!is_null(User::getUserById($item)))
        {
            $user = User::getUserById($item);
            if (is_null($user->image) || $user->image === '') {
                $img = 'asset/images/staffs/default.png';
            } else {
                $img = $user->image;
            }
            $join_course = JoinCourse::getCourseJoinByUser($item);
        } else{
            redirect('index.php?controller=staff&action=customer');
        }
    }
}
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="gray-color w-700 align-self-start">1 Result found for "<span class='pink-color'><?= $item ?></span>"</h5>
    <div class='profile-container'>
        <div class="pb-2">
            <img src='<?= $img ?>' alt='avatar' class='img-fluid customer-avatar' />
        </div>
        <span><?= $user->username ?></span>
    </div>
    <div class="card bg-white course-info d-flex flex-column rounded w-75 mx-3 mt-3 p-0">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color">Customer Info</h6>
        <table class="table table-borderless ml-3 my-3">
            <tr>
                <td class="label">NAME</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user->name ?></td>
            </tr>
            <tr>
                <td class="label">EMAIL</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user->email ?></td>
            </tr>
            <tr>
                <td class="label">BIRTH</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user->birth ?></td>
            </tr>
            <tr>
                <td class="label">NATION</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user->nation ?></td>
            </tr>
            <tr>
                <td class="label">PHONE</td>
                <td colspan="2" class="blue-color w-600 pl-4"><?= $user->phone ?></td>
            </tr>
            <tr>
                <td class="label">JOINING</td>
                <td colspan="2" class="blue-color w-600 pl-4">
                    <div class="d-flex flex-column">
                        <?php
                        foreach ($join_course as $i) {
                            $course = Course::getCourseById($i->course_id);
                            $name = $course->name;
                        ?>
                            <span><?= strtoupper($name) ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <h5 class="blue-color w-700 align-self-start mt-5 mb-3">PAYMENT HISTORY</h5>
    <table class="table bill bg-white rounded mb-5 w-75">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DATE</th>
                <th scope="col">COURSE</th>
                <th scope="col">PRICE</th>
            </tr>
        </thead>
        <form action="index.php" method="GET" name="detailBill">
            <input type="text" name="controller" value="bill" id='controller' style="display: none">
            <input type="text" name="action" value="view" id='action' style="display: none">
            <input type="text" name="id_bill" value="" id='id_bill' class="id_bill" style="display: none">
            <tbody>
                <?php
                $all_bill = Bill::getAllBillByUserId($user->id);
                foreach ($all_bill as $i) {
                    $course = Course::getCourseById($i->course_id);
                ?>
                <tr>
                        <th scope="row"><?= $i->id ?></th>
                        <td><?= date("d/m/yy", strtotime($i->date)) ?></td>
                        <td><?= $course->name ?></td>
                        <td><?= number_format($i->fee) ?> VND</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </form>
    </table>
</div>