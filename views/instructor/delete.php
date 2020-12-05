<?php
    if(!isset($_GET['pt_id'])){
        echo "<script>alert('PT id is not exist!')</script>";
        redirect('index.php?controller=staff&action=instructor');
    } else{
        Staff::deleteStaffById($_GET['pt_id']);
        redirect('index.php?controller=staff&action=instructor');
    }
?>