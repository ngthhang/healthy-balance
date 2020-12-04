<?php
require_once('models/User.php');
// require_once('models/Mail.php');
// require_once('models/Conversation.php');
// require_once('models/Spam.php');
// require_once('models/Star.php');
// require_once('models/Draft.php');
// require_once('models/Trash.php');
// require_once('models/BlockUser.php');
// require_once('models/Admin.php');
class BaseController
{
    protected $name;

    public function render($view, $data = array())
    {
        ob_start();
        extract($data);
        if ($this->name == 'login') {
            require_once('views/' . $this->name . '/' . $view . '.php');
        } 
        else if($this->name == 'landing'){
            if (isset($_SESSION['email']) || isset($_SESSION['email_staff'])) {
                // get info current user 
                // $current_user = str_replace('@gmail.com', '', $_SESSION['email_admin']);
                // $current_user = substr($current_user, 0, 13) . '...';
                // $user = Admin::getCurrentAdmin($_SESSION['email_admin']);
                // if (is_null($user->avatar) || $user->avatar === '') {
                //     $avatar = 'asset/images/avatar/1.png';
                // } else {
                //     $avatar = $user->avatar;
                // }
                // $current_user_id = $user->id;
                // $sysadmin = $user->sysadmin;
            }
            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();
            require_once('views/layout/landing_index.php');
        }
        else if ($this->name == 'staff') {
            // get info current user 
            // $current_user = str_replace('@gmail.com', '', $_SESSION['email_admin']);
            // $current_user = substr($current_user, 0, 13) . '...';
            // $user = Admin::getCurrentAdmin($_SESSION['email_admin']);
            // if (is_null($user->avatar) || $user->avatar === '') {
            //     $avatar = 'asset/images/avatar/1.png';
            // } else {
            //     $avatar = $user->avatar;
            // }
            // $current_user_id = $user->id;
            // $sysadmin = $user->sysadmin;

            // require_once('views/' . $this->name . '/' . $view . '.php');
            // $content = ob_get_clean();
            // require_once('views/layout/admin_index.php');
        } else {
            //get info current user
            $current_user = str_replace('@gmail.com', '', $_SESSION['email']);
            $user = User::getCurrentUser($_SESSION['email']);
            if (is_null($user->image) || $user->image === '') {
                $image = 'asset/images/customers/default.png';
            } else {
                $image = $user->image;
            }
            $current_user_id = $user->id;
            $all_view = array('index', 'schedule', 'bill', 'inbox');
            $class_style = array();
            foreach ($all_view as $i) {
                if ($view === $i) {
                    array_push($class_style, "table-body-active");
                } else {
                    array_push($class_style, "table-body");
                }
            }
            $class_style = array_values($class_style);
            require_once('views/' . $this->name . '/' . $view . '.php');
            $content = ob_get_clean();
            require_once('views/layout/index.php');
        }
    }
}
?>