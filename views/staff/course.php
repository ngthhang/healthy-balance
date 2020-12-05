<?php
$all_course = Course::getAll();
$total_course = Course::getSize();
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
        <h5 class="pink-color w-700">ALL COURSE (<?= $total_course['TOTALCOURSE'] ?>)</h5>
        <form action="index.php" method="GET">
            <input type="text" value="course" style="display: none;" name="controller" class="controller">
            <input type="text" value="add" style="display: none;" name="action" class="action">
            <button class="btn blue-bg text-white font-weight-bold px-4">ADD COURSE</button>
        </form>
    </div>
    <form action="index.php" method="GET" name="viewCourseInfo">
        <input type="text" value="" style="display: none;" name="controller" class="controller">
        <input type="text" value="" style="display: none;" name="action" class="action">
        <input type="text" value="" style="display: none;" name="id_course" class="id_course">
        <div class="row justify-content-start pb-3 pl-3">
            <?php
            foreach ($all_course as $i) {
                $course_id = $i->id;
                $name = $i->name;
                $pt = Staff::getStaffById($i->pt_id);
                $pt_name = $pt->name;
                $pt_avatar = $pt->image;
                $start = substr($i->start_time, 0, 5);
                $end = substr($i->end_time, 0, 5);
                $date = $i->date;
                $place = $i->place;
            ?>
                <div style="cursor: pointer" class="d-flex flex-row col-xl-5 col-md-5 col-lg-5 card p-0 mr-3 mb-3">
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
                            <span class="t-14">Student: <span class="bluesky-color w-700"><?= $i->slot ?></span> / <?= $i->available ?></span>
                        </div>
                    </div>
                    <div class='holder d-flex flex-column justify-content-around align-items-center col-xl-2 col-md-2 col-lg-2'>
                        <i class="material-icons btn" onclick="viewCourse(<?= $i->id ?>)">info</i>
                        <i class="material-icons btn" onclick="editCourseInStaffCourse(<?= $i->id ?>)">edit</i>
                        <i class="material-icons btn" data-toggle="modal" data-target="#exampleModal_<?= $i->id ?>">close</i>
                    </div>
                    <div class="modal fade" id="exampleModal_<?= $i->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?= $i->id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel_<?= $i->id ?>">Delete course</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete course <?= $i->name ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="deleteCourse(<?= $i->id ?>)" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </form>
</div>