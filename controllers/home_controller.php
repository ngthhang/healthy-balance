<?php
    require_once('base_controller.php');
    class HomeController extends BaseController {
        function __construct(){
            $this->name = 'home';
        }
        function index(){
            $this->render('index', array());
        }
        function error(){
            $this->render('error', array());
        }

        function bill(){
            $this->render('bill', array());
        }

        function inbox(){
            $this->render('inbox', array());
        }

        function profile()
        {
            $this->render('profile', array());
        }
        function schedule()
        {
            $this->render('schedule', array());
        }
    }
?>
