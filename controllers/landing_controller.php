<?php
        require_once('base_controller.php');
        class LandingController extends BaseController {
            function __construct(){
                $this->name = 'landing';
            }

            function index(){
                $this->render('index', array());
            }

            function error(){
                $this->render('error', array());
            }

            function gallery(){
                $this->render('gallery', array());
            }

            function blogs(){
                $this->render('blogs', array());
            }
        }
?>