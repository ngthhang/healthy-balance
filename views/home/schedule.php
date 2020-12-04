<?php
$join_course = JoinCourse::getCourseJoinByUser($user->id);
$available_course = Course::getCourseAvailable();
?>
<div class="d-flex flex-column col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <h5 class="pink-color pt-2 pb-3 w-700">YOUR CURRENT ACTIVITIES</h5>
    <div class="row justify-content-start pb-3 pl-3">
        <?php
        foreach ($join_course as $i) {
            $course = Course::getCourseById($i->course_id);
            $name = $course->name;
            $pt = Staff::getStaffById($course->pt_id);
            $pt_name = $pt->name;
            $pt_avatar = $pt->image;
            $start = substr($course->start_time, 0, 5);
            $end = substr($course->end_time, 0, 5);
            $date = $course->date;
            $place = $course->place;
        ?>
            <div class="d-flex flex-row col-xl-5 col-md-5 col-lg-5 card p-0 mr-3 mb-3">
                <img src="<?= $pt_avatar ?>" alt="" class="p-0 col-xl-5 col-md-5 col-lg-5">
                <div class="d-flex flex-column align-items-start justify-content-between col-xl-5 col-md-5 col-lg-5 pr-0">
                    <div class="d-flex flex-column pt-3">
                        <span class="t-16"><?= $name ?></span>
                        <span class="t-14"><?= $pt_name ?></span>
                    </div>
                    <div class='d-flex flex-column pb-3'>
                        <span class="t-14"><?= $start ?> - <?= $end ?></span>
                        <span class="t-14"><?= $date ?> every week</span>
                        <span class="t-14"><?= $place ?></span>
                    </div>
                </div>
                <div class='holder d-flex flex-column justify-content-around align-items-center col-xl-2 col-md-2 col-lg-2'>
                    <i class="material-icons btn" onclick="viewCourseInfo(<?= $id->course_id ?>)">info</i>
                    <i class="material-icons btn">sms</i>
                    <i class="material-icons btn" onclick="cancelJoinCourse(<?= $id->course_id ?>,<?= $id->user_id ?>)">close</i>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <h5 class="pink-color pt-2 pb-3 w-700">AVAILABLE COURSES</h5>
    <div class="row justify-content-start pb-3 pl-3">
        <?php
        foreach ($available_course as $i) {
            if (!JoinCourse::checkUserJoinCourse($i->id, $user->id)) {
                $course = Course::getCourseById($i->id);
                $name = $course->name;
                $pt = Staff::getStaffById($course->pt_id);
                $pt_name = $pt->name;
                $pt_avatar = $pt->image;
                $start = substr($course->start_time, 0, 5);
                $end = substr($course->end_time, 0, 5);
                $date = $course->date;
                if ($course->discount == '' || is_null($course->discount)) {
                    $price = number_format($course->price);
                    $d_none = 'd-none';
                } else {
                    $discount = $course->discount;
                    $d_none = '';
                    $price = number_format($course->price - ($course->price) * ($discount) / 100);
                }
        ?>
                <div class="d-flex flex-row col-xl-5 col-md-5 col-lg-5 card p-0 mr-3 mb-3">
                    <img src="<?= $pt_avatar ?>" alt="" class="p-0 col-xl-5 col-md-5 col-lg-5">
                    <div class="d-flex flex-column align-items-start justify-content-between col-xl-5 col-md-5 col-lg-5 pr-0">
                        <div class="d-flex flex-column pt-3">
                            <span class="t-16"><?= $name ?></span>
                            <span class="t-14"><?= $pt_name ?></span>
                        </div>
                        <div class='d-flex flex-column pb-3'>
                            <span class="t-14"><?= $start ?> - <?= $end ?></span>
                            <span class="t-14"><?= $date ?> every week</span>
                            <span class="t-16 w-600 red-color">Price: <?= $price ?> <span class="<?= $d_none ?> blue-color">(-<?= $discount ?>%)</span></span>
                        </div>
                    </div>
                    <div class='holder d-flex flex-column justify-content-around align-items-center col-xl-2 col-md-2 col-lg-2'>
                        <i class="material-icons btn" onclick="viewCourseInfo(<?= $id->course_id ?>)">info</i>
                        <i class="material-icons btn">sms</i>
                        <i class="material-icons btn" onclick="joinCourse(<?= $id->course_id ?>,<?= $id->user_id ?>)">close</i>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>