<?php
    require_once('base_controller.php');
    class BillController extends BaseController {
        function __construct(){
            $this->name = 'bill';
        }
        function view(){
            $this->render('view', array());
        }
    }
?>