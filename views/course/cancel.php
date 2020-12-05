<?php 
    if(!isset($_GET['id_course'])){
        redirect('index.php?controller=home&action=schedule');
    } else{
        $course_id = $_GET['id_course'];
        $user_id = $user->id;
        $is_deleted = JoinCourse::deleteUserFromCourse($user_id, $course_id);
        $slot = Course::getCourseById($course_id)->slot - 1;
        $update_slot = Course::updateSlotById($course_id, $slot);
        redirect('index.php?controller=home&action=schedule');
    }
?>