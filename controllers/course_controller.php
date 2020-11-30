<?php
    require_once('base_controller.php');
    class CourseController extends BaseController {
        function __construct(){
            $this->name = 'course';
        }
        function view(){
            $this->render('view', array());
        }
    }
?>
