<?php 
    if(!isset($_GET['id_course'])){
        redirect('index.php?controller=home&action=schedule');
    } else{
        $course_id = $_GET['id_course'];
        $user_id = $user->id;
        JoinCourse::addUserToCourse($user_id, $course_id);
        redirect('index.php?controller=home&action=schedule');
    }
