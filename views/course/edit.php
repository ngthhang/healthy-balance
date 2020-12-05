<?php
if (!isset($_GET['id_course'])) {
    echo "<script>alert('Course id is not exist!')</script>";
    redirect('index.php?controller=staff&action=course');
} else {
    $course_id = $_GET['id_course'];
    $course = Course::getCourseById($course_id);
    if ($course->payment == 1) {
        $selected = 'selected';
    } else {
        $selected = null;
    }
}
if (isset($_POST['editCourse'])) {
    $name = addslashes($_POST['name']);
    $date = addslashes($_POST['date']);
    $start = addslashes($_POST['start']);
    $end = addslashes($_POST['end']);
    $place = addslashes($_POST['place']);
    $available = addslashes($_POST['available']);
    $payment = addslashes($_POST['payment']);
    $description = addslashes($_POST['description']);
    $price = addslashes($_POST['price']);
    $discount = addslashes($_POST['discount']);
    $pt_id = addslashes($_POST['pt_id']);
    if($start == '' || is_null($start)){
        echo 'jo';
        $start = $course->start_time;
        $end = $course->end_time;
    }
    if (strtotime($start) >= strtotime($end)) {
        echo "<script>alert('End time can not earlier or equal to start time ')</script>";
    } else {
        if (is_null($payment) || $payment == '') {
            $payment = 0;
        }
        $all_pt = Staff::getStaffByRole(2);
        $is_pt = false;
        foreach ($all_pt as $i) {
            if ($i->id == $pt_id) {
                $is_pt = true;
                break;
            }
        }
        if (!$is_pt) {
            echo "<script>alert('Wrong id of instructor, please try again');</script>";
            redirect('index.php?controller=staff&action=course');
        }
        Course::updateCourseById($course_id, $name, $description, $date, $start, $end, $place, $available, $payment, $price, $discount, $pt_id);
        redirect(`index.php?controller=staff&action=course`);
    }
}
if (isset($_POST['cancelAddCourse'])) {
    redirect('index.php?controller=staff&action=course');
}
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700 align-self-start">EDIT COURSE <?= $course_id ?></h5>
    <div class="card bg-white course-info d-flex flex-column rounded col-xl-10 col-md-10 col-lg-10 p-0 mb-5">
        <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color"></h6>
        <form action="" method="POST">
            <table class="table table-borderless ml-3 my-3">
                <tr>
                    <td class="label">NAME</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter course name" type="text" class='profile-input col-10' value="<?= $course->name ?>" $" name="name"></td>
                </tr>
                <tr>
                    <td class="label">DATE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter course schedule" type="text" class='profile-input col-10' value="<?= $course->date ?>" name="date"></td>
                </tr>
                <tr>
                    <td class="label">PLACE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter place" type="text" class='profile-input col-10' value="<?= $course->place ?>" name="place"></td>
                </tr>
                <tr>
                    <td class="label">START TIME</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter course start time" type="time" class='profile-input col-10' value="<?= $course->start_time ?>" name="start"></td>
                </tr>
                <tr>
                    <td class="label">END TIME</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter course end time" type="time" class='profile-input col-10' value="<?= $course->end_time ?>" name="end"></td>
                </tr>
                <tr>
                    <td class="label">AVAILABLE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter available" type="number" class='profile-input col-10' name="available" value="<?= $course->available ?>"></td>
                </tr>
                <tr>
                    <td class="label">PAYMENT</td>
                    <td colspan="2" class="blue-color w-600 pl-4">
                        <input type="radio" id="payment" name="payment" value="1" <?= $selected ?>>
                        <label class='m-0 mx-2 blue-color t-20' for="payment">Payment online</label><br>
                    </td>
                </tr>
                <tr>
                    <td class="label">DESCRIPTION</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter description" type="text" class='profile-input col-10' value="<?= $course->description ?>" name="description"></td>
                </tr>
                <tr>
                    <td class="label">PRICE</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter price" value="<?= $course->price ?>" type="number" class='profile-input col-10' name="price"></td>
                </tr>
                <tr>
                    <td class="label">DISCOUNT</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter discount" type="number" value="<?= $course->discount ?>" class='profile-input col-10' name="discount"></td>
                </tr>
                <tr>
                    <td class="label">INSTRUCTOR</td>
                    <td colspan="2" class="blue-color w-600 pl-4"><input placeholder="Enter instrutor id" value="<?= $course->pt_id ?>" type="number" class='profile-input col-10' name="pt_id"></td>
                </tr>
            </table>
            <div class="d-flex flex-row align-items-center justify-content-end w-100">
                <button name='cancelAddCourse' class='my-3 btn lightgray-bg px-3'>
                    <span class="blue-color w-600">CANCEL</span>
                </button>
                <button name='editCourse' class='my-3 btn red-bg px-3 ml-3 mr-4'>
                    <span class="text-white w-600">EDIT COURSE</span>
                </button>
            </div>
        </form>
    </div>
</div>