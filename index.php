<?php
    require_once('config/config.php');
    if (!isset($_SESSION)) {
        session_start();
    }

    $support_controller = array(
        'landing' => array('index', 'error', 'gallery', 'blogs'),
        'login' => array('index', 'logup', 'logout', 'login_staff'),
        'home' => array('index', 'bill', 'error', 'inbox', 'profile', 'schedule'),
        'course' => array('view','cancel','register'),
        'bill' => array('view', 'payment')
    );

    $support_controller_staff = array(
        'login' => array('index', 'logup', 'logout', 'login_staff'),
        'course' => array('staff_view','edit','add','delete'),
        'customer' => array('view', 'edit', 'add'),
        'instructor' => array('edit', 'view', 'add'),
        'staff' => array('bill_payment','course','customer','instructor','error','profile')
    );

    if (isset($_SESSION['email']) || isset($_SESSION['email_staff'])) {
        if (isset($_SESSION['email_staff'])) {
            if (isset($_GET['controller'])) {
                $controller = $_GET['controller'];
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = 'index';
                }
            } else {
                $controller = 'staff';
                $action = 'course';
            }
            if (
                !array_key_exists($controller, $support_controller_staff) ||
                !in_array($action, $support_controller_staff[$controller])
            ) {
                $controller = 'staff';
                $action = 'error';
            }
        } else {
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
        }
    } else {
        if (isset($_GET['controller'])) {
            $controller = $_GET['controller'];
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = 'index';
            }
        } else {
            $controller = 'landing';
            $action = 'index';
        }
    }

    include_once('controllers/' . $controller . '_controller.php');
    $className = ucfirst($controller) . "Controller";

    $obj = new $className();
    $obj->$action();
