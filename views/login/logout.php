<?php 
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
        redirect('index.php?controller=landing&action=index');
    }
    if (isset($_SESSION['email_staff'])) {
        unset($_SESSION['email_staff']);
        redirect('index.php?controller=login&action=login_staff');
    }
?>
