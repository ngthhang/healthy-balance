<?php
$join_course = JoinCourse::getCourseJoinByUser($user->id);
$available_course = Course::getCourseAvailable();
if (count($join_course) == 0) {
    $display_style_no_data = 'd-flex';
} else {
    $display_style_no_data = 'd-none';
}
if (count($available_course) == 0) {
    $display_style_no_available = 'd-flex';
} else {
    $display_style_no_available = 'd-none';
}
?>
<div class="d-flex flex-column col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <form action="index.php" method="GET" name="viewCourseInfo">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="id_course" class="id_course">
        <h5 class="pink-color pt-2 pb-3 w-700">YOUR CURRENT ACTIVITIES</h5>
        <div class="row justify-content-start pb-3 pl-3">
            <div class="<?= $display_style_no_data ?> flex-column display-no-data align-items-center justify-content-center col-xl-12 col-md-12 col-lg-12 p-0 mr-3 mb-3">
                <span class="material-icons gray-color t-40">
                    fitness_center
                </span>
                <span class='gray-color t-14 my-3'>Sign up for a course to use our services</span>
            </div>
            <?php
            foreach ($join_course as $i) {
                $course_id = $i->course_id;
                $user_id = $i->user_id;
                $course = Course::getCourseById($course_id);
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
                            <span class="t-16"><?= strtoupper($name) ?></span>
                            <span class="t-14"><?= $pt_name ?></span>
                        </div>
                        <div class='d-flex flex-column pb-3'>
                            <span class="t-14"><?= $start ?> - <?= $end ?></span>
                            <span class="t-14"><?= $date ?> every week</span>
                            <span class="t-14"><?= $place ?></span>
                        </div>
                    </div>
                    <div class='holder d-flex flex-column justify-content-around align-items-center col-xl-2 col-md-2 col-lg-2'>
                        <i class="material-icons btn" onclick="viewInfo(<?= $course_id ?>)">info</i>
                        <i class="material-icons btn">sms</i>
                        <i class="material-icons btn" data-toggle="modal" data-target="#exampleModal1">close</i>
                    </div>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Cancel course <?= $course->name ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to cancel your course?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="cancelCourseInSchedule(<?= $course_id ?>)" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
        </div>
<h5 class="pink-color pt-2 pb-3 w-700">AVAILABLE COURSES</h5>
<div class="row justify-content-start pb-3 pl-3">
    <div class="<?= $display_style_no_available ?> flex-column display-no-data align-items-center justify-content-center col-xl-12 col-md-12 col-lg-12 p-0 mr-3 mb-3">
        <span class="material-icons gray-color t-40">
            fitness_center
        </span>
        <span class='gray-color t-14 my-3'>There is no available course. Contact us to make a request</span>
    </div>
    <?php
    foreach ($available_course as $i) {
        if (!JoinCourse::checkUserJoinCourse($user->id, $i->id)) {
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
                $discount = '';
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
                        <span class="t-16"><?= strtoupper($name) ?></span>
                        <span class="t-14"><?= $pt_name ?></span>
                    </div>
                    <div class='d-flex flex-column pb-3'>
                        <span class="t-14"><?= $start ?> - <?= $end ?></span>
                        <span class="t-14"><?= $date ?> every week</span>
                        <span class="t-16 w-600 red-color">Price: <?= $price ?> <span class="<?= $d_none ?> blue-color">(-<?= $discount ?>%)</span></span>
                    </div>
                </div>
                <div class='holder d-flex flex-column justify-content-around align-items-center col-xl-2 col-md-2 col-lg-2'>
                    <i class="material-icons btn" onclick="viewInfo(<?= $i->id ?>)">info</i>
                    <i class="material-icons btn">sms</i>
                    <i class="material-icons btn" onclick="registerCourseInSchedule(<?= $i->id ?>)">add</i>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
</form>
</div>