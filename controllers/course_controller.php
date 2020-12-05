<?php
    require_once('base_controller.php');
    class CourseController extends BaseController {
        function __construct(){
            $this->name = 'course';
        }
        function view(){
            $this->render('view', array());
        }

        function cancel()
        {
            $this->render('cancel', array());
        }

        function delete()
        {
            $this->render('delete', array());
        }
        
        function register()
        {
            $this->render('register', array());
        }

        function staff_view()
        {
            $this->render('staff_view', array());
        }

        function edit()
        {
            $this->render('edit', array());
        }

        function add()
        {
            $this->render('add', array());
        }
    }
?>
