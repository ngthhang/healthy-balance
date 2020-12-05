<?php
require_once('base_controller.php');
class CustomerController extends BaseController
{
    function __construct()
    {
        $this->name = 'customer';
    }
    function view()
    {
        $this->render('view', array());
    }
    function add()
    {
        $this->render('add', array());
    }

    function edit()
    {
        $this->render('edit', array());
    }
}
