<?php
    require_once('config/config.php');
    if (!isset($_SESSION)) {
        session_start();
    }
        
    $support_controller = array(
        'landing' => array('index','error','gallery','blogs'),
        'login' => array('index', 'logup', 'logout', 'login_staff'),
        'home' => array('index', 'bill', 'error', 'inbox','profile','schedule'),
        'course' => array('view'),
        'bill' => array('view')
    );

    $support_controller_staff = array(
        'login' => array('index', 'logup', 'logout', 'login_staff')
    );
    
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }
    } else {
        $controller = 'home';
        $action = 'index';
    }

    if (
        !array_key_exists($controller, $support_controller) ||
        !in_array($action, $support_controller[$controller])
    ) {
        $controller = 'landing';
        $action = 'error';
    }
        
    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();
?>