<?php
$all_bill = Bill::getAllBillByUserId($user->id);
$all_course_join = JoinCourse::getCourseJoinByUser($user->id);
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
        <h5 class="pink-color w-700">BILL&PAYMENT</h5>
        <button class="btn blue-bg text-white font-weight-bold px-4" data-toggle="modal" data-target="#staticBackdrop">MAKE A PAYMENT</button>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <form action="" method="GET" name="payment">
            <input type="text" value="" style="display: none;" name="controller" class="controller">
            <input type="text" value="" style="display: none;" name="action" class="action">
            <input type="text" value="" style="display: none;" name="id_course" class="id_course">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Choose course to make payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        foreach ($all_course_join as $i) {
                            $course = Course::getCourseById($i->course_id);
                        ?>
                            <div class='d-flex flex-row align-items-center jusity-content-center col-xl-4col-md-4 col-lg-4'>
                                <input type="radio" id="course_<?= $course->id ?>" name="course" value="<?= $course->id ?>">
                                <label class='m-0 mx-2 blue-color t-20' for="course_<?= $course->id ?>"><?= $course->name ?></label><br>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="makePayment()">Continue</button>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
    <table class="table bill bg-white rounded">
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
                foreach ($all_bill as $i) {
                    $course = Course::getCourseById($i->course_id);
                ?>
                    <tr onclick="viewBill(<?= $i->id ?>)">
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