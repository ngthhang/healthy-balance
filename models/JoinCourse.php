<?php
require_once('config/config.php');
class JoinCourse
{
    public $user_id;
    public $course_id;

    public function __construct($user_id, $course_id)
    {
        $this->user_id = $user_id;
        $this->course_id = $course_id;
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM JOIN_COURSE';
        $db = DB::getDB();
        $stm = $db->query($sql);
        $data = array();
        while ($i = $stm->fetch_array()) {
            $data[] = new JoinCourse($i['USER_ID'], $i['COURSE_ID']);
        }
        return $data;
    }

    public static function getCourseJoinByUser($user_id)
    {
        $sql = 'SELECT * FROM JOIN_COURSE WHERE USER_ID = ?';
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $user_id);
        $status = $stm->execute();
        $data = array();
        if ($status) {
            $result = $stm->get_result();
            while ($i = $result->fetch_array()) {
                $data[] = new JoinCourse($i['USER_ID'], $i['COURSE_ID']);
            }
            return $data;
        }
        $stm->close();
        return null;
    }

    public static function addUserToCourse($user_id, $course_id)
    {
        $sql = "INSERT INTO JOIN_COURSE VALUES(?,?)";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('ii', $user_id, $course_id);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function deleteUserFromCourse($user_id, $course_id)
    {
        $sql = "DELETE FROM JOIN_COURSE WHERE COURSE_ID = ? AND USER_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('ii', $course_id, $user_id);
        $status = $stm->execute();
        $stm->close();
        return $status;
    }

    public static function checkUserJoinCourse($user_id, $course_id)
    {
        $sql = "SELECT * FROM JOIN_COURSE WHERE COURSE_ID = ? AND USER_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('ii', $course_id, $user_id);
        $status = $stm->execute();
        if ($status) {
            $result = $stm->get_result();
            while ($i = $result->fetch_array()) {
                return new JoinCourse($i['USER_ID'], $i['COURSE_ID']);
            }
        }
        $stm->close();
        return null;
    }
}
