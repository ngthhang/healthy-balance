<?php
require_once('models/User.php');
require_once('models/Staff.php');
require_once('models/Bill.php');
require_once('models/Course.php');
require_once('models/JoinCourse.php');
    $join_course = JoinCourse::getCourseJoinByUser(1);
    $available_course = Course::getCourseAvailable();
    foreach ($available_course as $i){
        if(JoinCourse::checkUserJoinCourse($i->id,2)){
            echo 'hiiiiii23';
        }
    }
?>