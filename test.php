<?php
require_once('models/User.php');
require_once('models/Staff.php');
require_once('models/Bill.php');
require_once('models/Course.php');
require_once('models/JoinCourse.php');

    print_r($bill);
    $bill = Bill::getAll();
print_r($bill);
?>