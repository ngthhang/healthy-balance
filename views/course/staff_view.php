<?php
if (!isset($_GET['id_course'])) {
    echo "<script>alert('Course id is not exist!')</script>";
    redirect('index.php?controller=staff&action=course');
} else {
    $id_course = $_GET['id_course'];
    $course = Course::getCourseById($id_course);
    $pt = Staff::getStaffById($course->pt_id);
    $pt_facebook = str_replace('@gmail.com', '', $pt->email);
    $start = substr($course->start_time, 0, 5);
    $end = substr($course->end_time, 0, 5);
    if (is_null($course->discount) || $course->discount == '') {
        $display_text = 'Not available';
        $display_style = 'lightgray-color';
    } else {
        $display_text = $course->discount;
        $display_style = 'pink-color';
    }
}
?>
<div class="d-flex flex-column col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <form action="index.php" method="GET" name="formCourseView">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="id_course" class="id_course">
        <h5 class="pink-color pt-2 pb-3 w-700"><?= strtoupper($course->name) ?></h5>
        <div class="row justify-content-start pb-5">
            <div class="card bg-white course-info d-flex flex-column rounded col-xl-8 col-md-8 col-lg-8 mx-3 p-0 bg-warning">
                <h6 class="header py-3 w-600 pl-3 w-100 blue-bg orange-color">Course Info</h6>
                <table class="table table-borderless ml-3 my-3">
                    <tr>
                        <td class="label">DATE</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><?= $course->date ?></td>
                    </tr>
                    <tr>
                        <td class="label">TIME</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><?= $start ?> - <?= $end ?></td>
                    </tr>
                    <tr>
                        <td class="label">PLACE</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><?= $course->place ?></td>
                    </tr>
                    <tr>
                        <td class="label">ID</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><?= $id_course ?></td>
                    </tr>
                    <tr>
                        <td class="label">AVAILABLE</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><span class="bluesky-color w-700"><?= $course->slot ?></span> / <?= $course->available ?></td>
                    </tr>
                    <tr>
                        <td class="label">PRICE</td>
                        <td colspan="2" class="pink-color w-600 pl-4"><?= number_format($course->price) ?> <span class="blue-color t-14">( per month )</span></td>
                    </tr>
                    <tr>
                        <td class="label">DESCRIPTION</td>
                        <td colspan="2" class="blue-color w-600 pl-4"><?= $course->description ?></td>
                    </tr>
                    <tr>
                        <td class="label">DISCOUNT</td>
                        <td colspan="2" class="<?= $display_style ?> w-600 pl-4"><?= $display_text ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-xl-3 col-md-3 col-lg-3 p-0">
                <div class="py-4 rounded shadow blue-bg course-info d-flex flex-row align-items-center justify-content-center">
                    <img src="<?= $pt->image ?>" alt="" class="img-fluid avatar-pt">
                    <div class="pl-4 d-flex flex-column align-items-left justify-content-center">
                        <span class='text-white t-16'><?= $pt->name ?></span>
                        <span class='pt-3 w-700 text-white'><?= $pt->nation ?></span>
                    </div>
                </div>
                <div class="my-3 rounded shadow bg-white course-info pl-3 d-flex flex-column">
                    <h6 class="pt-4 pb-3 w-400 w-100">Contact</h6>
                    <div class="d-flex flex-row pb-3">
                        <i class="t-40 material-icons blue-color">facebook</i>
                        <div class="d-flex flex-column pl-3">
                            <span class='gray-color t-14 w-400'>Facebook</span>
                            <span class='blue-color t-14 w-600'>facebook/<?= $pt_facebook ?></span>
                        </div>
                    </div>
                    <div class="d-flex flex-row pb-3">
                        <i class="t-40 material-icons blue-color">mail</i>
                        <div class="d-flex flex-column pl-3">
                            <span class='gray-color t-14 w-400'>Email</span>
                            <span class='blue-color t-14 w-600'><?= $pt->email ?></span>
                        </div>
                    </div>
                    <div class="d-flex flex-row pb-3">
                        <i class="t-40 material-icons blue-color">call</i>
                        <div class="d-flex flex-column pl-3">
                            <span class='gray-color t-14 w-400'>Phone</span>
                            <span class='blue-color t-14 w-600'><?= $pt->phone ?></span>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center w-100 py-2 rounded shadow blue-bg orange-color">
                    Instructor
                </div>
            </div>
        </div>
        <div class='row justify-content-end mx-5 pr-2 pb-5'>
            <button type="button" class="w-25 mr-3 py-2 text-white w-600 btn red-bg" onclick="editCourse(<?= $id_course ?>)">EDIT INFO</button>
            <button type="button" class="px-5 py-2 w-600 btn btn-outline-secondary" onclick="back('staff','course')">BACK</button>
        </div>
    </form>
</div>