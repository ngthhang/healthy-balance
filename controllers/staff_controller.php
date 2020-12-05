<?php
    require_once('base_controller.php');
    class StaffController extends BaseController {
        function __construct(){
            $this->name = 'staff';
        }
        function index(){
            $this->render('index', array());
        }
        function error(){
            $this->render('error', array());
        }

        function bill_payment(){
            $this->render('bill_payment', array());
        }
        function course(){
            $this->render('course', array());
        }
        function customer()
        {
            $this->render('customer', array());
        }
        function instructor()
        {
            $this->render('instructor', array());
        }
    function profile()
    {
        $this->render('profile', array());
    }
    }
