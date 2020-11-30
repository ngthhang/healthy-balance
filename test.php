<?php
    $avatar = 'asset/images/landing/1.png';
    $current_user = 'ngthhang';
    $view = 'index';
    $all_view = array('index', 'schedule', 'bill', 'inbox');
    $class_style = array();
    foreach ($all_view as $i) {
        if ($view === $i) {
            array_push($class_style, "table-body-active");
        } else {
            array_push($class_style, "table-body");
        }
    }
    $class_style = array_values($class_style);
    require_once('views/layout/index.php');
?>