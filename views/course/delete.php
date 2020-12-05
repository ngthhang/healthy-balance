<?php
    if(!isset($_GET['id_course'])){
        echo "<script>alert('Course id is not exist!')</script>";
        redirect('index.php?controller=staff&action=course');
    } else{
        Course::deleteCourseById($_GET['id_course']);
        redirect('index.php?controller=staff&action=course');
    }
?>