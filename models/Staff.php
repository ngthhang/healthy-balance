<?php
require_once('config/config.php');
class Staff
{
    public $id;
    public $role;
    public $name;
    public $email;
    public $phone;
    public $nation;
    public $birth;
    public $image;
    public $description;
    public $password;

    public function __construct($id, $role, $name, $email, $phone, $nation, $birth, $image, $description, $password)
    {
        $this->id = $id;
        $this->role = $role;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->nation = $nation;
        $this->birth = $birth;
        $this->image = $image;
        $this->description = $description;
        $this->password = $password;
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM STAFF';
        $db = DB::getDB();
        $stm = $db->query($sql);
        $data = array();
        while ($i = $stm->fetch_array()) {
            $data[] = new Staff($i['STAFF_ID'], $i['ROLE'], $i['NAME'], $i['EMAIL'], $i['PHONE'], $i['NATION'], $i['BIRTH'], $i['IMAGE'], $i['DESCRIPTION'], $i['PASSWORD']);
        }
        return $data;
    }

    public static function getSize()
    {
        $sql = 'SELECT MAX(ID) AS TOTALSTAFF FROM STAFF';
        $db = DB::getDB();
        $stm = $db->query($sql);
        return $stm->fetch_array();
    }

    public static function checkStaffExist($mail)
    {
        $check_user = 'SELECT * FROM STAFF WHERE EMAIL = ?';
        $db = DB::getDB();
        $stm = $db->prepare($check_user);
        $stm->bind_param('s', $mail);
        $status = $stm->execute();

        if ($status) {
            $data = $stm->get_result();
            return $data->num_rows;
        }
        $stm->close();
        return null;
    }

    public static function checkLogin($mail, $pass)
    {
        $check_user = 'SELECT * FROM STAFF WHERE EMAIL = ? AND PASSWORD = ?';
        $db = DB::getDB();
        $stm = $db->prepare($check_user);
        $stm->bind_param('ss', $mail, $pass);
        $status = $stm->execute();

        if ($status) {
            $data = $stm->get_result();
            return $data->num_rows;
        }
        $stm->close();
        return null;
    }

    public static function addStaff($id,$role, $name, $email, $phone, $nation, $birth, $image, $description, $password)
    {
        $sql = 'INSERT INTO STAFF VALUES(?,?,?,?,?,?,?,?,?,?)';
        $db = DB::getDB();
        $total_user = Staff::getSize();
        $id = $total_user['TOTALSTAFF'] + 1;
        $stm = $db->prepare($sql);
        $stm->bind_param('iissssssss', $id, $role, $name, $email, $phone, $nation, $birth, $image, $description, $password);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function getCurrentStaff($mail)
    {
        $check_user = 'SELECT * FROM STAFF WHERE EMAIL = ?';
        $db = DB::getDB();
        $stm = $db->prepare($check_user);
        $stm->bind_param('s', $mail);
        $status = $stm->execute();

        if ($status) {
            $data = $stm->get_result();
            while ($i = $data->fetch_array()) {
                return new Staff($i['STAFF_ID'], $i['ROLE'], $i['NAME'], $i['EMAIL'], $i['PHONE'], $i['NATION'], $i['BIRTH'], $i['IMAGE'], $i['DESCRIPTION'], $i['PASSWORD']);
            }
        }
        $stm->close();
        return null;
    }

    public static function getStaffById($id)
    {
        $sql = 'SELECT * FROM STAFF WHERE STAFF_ID = ?';
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $id);
        $status = $stm->execute();

        if ($status) {
            $data = $stm->get_result();
            while ($i = $data->fetch_array()) {
                return new Staff($i['STAFF_ID'], $i['ROLE'], $i['NAME'], $i['EMAIL'], $i['PHONE'], $i['NATION'], $i['BIRTH'], $i['IMAGE'], $i['DESCRIPTION'], $i['PASSWORD']);
            }
        }
        $stm->close();
        return null;
    }

    public static function changeStaffInfo($id, $role, $name, $email, $phone, $nation, $birth, $image, $description, $password)
    {
        $sql = "UPDATE STAFF SET ROLE = ?, NAME = ?, EMAIL = ?, PHONE = ?, NATION = ?, BIRTH = ?, IMAGE = ?, DESCRIPTION = ?, PASSWORD = ? WHERE STAFF_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('issssssssi', $role, $name, $email, $phone, $nation, $birth, $image, $description, $password, $id);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function deleteStaffById($id)
    {
        $sql = "DELETE FROM STAFF WHERE STAFF_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $id);
        $status = $stm->execute();
        $stm->close();
        return $status;
    }
}
