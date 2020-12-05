<?php
require_once('base_controller.php');
class InstructorController extends BaseController
{
    function __construct()
    {
        $this->name = 'instructor';
    }
    function add()
    {
        $this->render('add', array());
    }

    function edit()
    {
        $this->render('edit', array());
    }

    function delete()
    {
        $this->render('delete', array());
    }
}
