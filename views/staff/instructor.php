<?php
$all_pt = Staff::getStaffByRole(2);
$total_pt = count($all_pt);
?>
<div class="d-flex flex-column align-items-center justify-content-start col-xl-10 col-md-10 col-lg-10 p-0 content-wrapper px-5 pt-5 mt-2">
    <div class="d-flex flex-row align-items-center justify-content-between w-100 mb-5">
        <h5 class="pink-color w-700">ALL INSTRUCTORS (<?= $total_pt ?>)</h5>
        <form action="index.php" method="GET">
            <input type="text" value="instructor" style="display: none;" name="controller" class="controller">
            <input type="text" value="add" style="display: none;" name="action" class="action">
            <button class="btn blue-bg text-white font-weight-bold px-4">ADD INSTRUCTOR</button>
        </form>
    </div>
    <table class="table bill bg-white rounded">
        <thead>
            <tr>
                <th scope="col">AVATAR</th>
                <th scope="col">NAME</th>
                <th scope="col">PHONE</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <form action="index.php" method="GET" name="viewInstructorInfo">
            <input type="text" value="" style="display: none;" name="controller" class="controller">
            <input type="text" value="" style="display: none;" name="action" class="action">
            <input type="text" value="" style="display: none;" name="pt_id" class="pt_id">
            <?php
            foreach ($all_pt as $i) {
                if (is_null($i->image) || $i->image === '') {
                    $image = 'asset/images/staffs/default.png';
                } else {
                    $image = $i->image;
                }
            ?>
                <tr>
                    <td onclick="editInfoPt(<?= $i->id ?>)"><img src="<?= $image ?>" alt="" class="img-fluid avatar"></td>
                    <td onclick="editInfoPt(<?= $i->id ?>)"><?= $i->name ?></td>
                    <td onclick="editInfoPt(<?= $i->id ?>)"><?= $i->phone ?></td>
                    <td class="d-flex flex-row align-items-center justify-content-center">
                        <i class="material-icons btn lightgray-color" onclick="editInfoPt(<?= $i->id ?>)">edit</i>
                        <i class="material-icons btn lightgray-color" data-toggle="modal" data-target="#exampleModal_<?= $i->id ?>">close</i>
                        <div class="modal fade" id="exampleModal_<?= $i->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel_<?= $i->id ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel_<?= $i->id ?>">Delete instructor</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete instructor <?= $i->name ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" onclick="deleteInstructor(<?= $i->id ?>)" class="btn btn-primary">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </form>
    </table>
</div>