<?php
    require_once('config/config.php');
    
    $support_controller = array(
        'landing' => array('index','error','gallery','blogs')
    );

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        } else {
            $action = 'index';
        }
    } else {
        $controller = 'landing';
        $action = 'index';
    }

    if(!array_key_exists($controller, $support_controller) || 
    !in_array($action, $support_controller[$controller])){
        $controller = 'landing';
        $action = 'error';
    }

    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();

?>