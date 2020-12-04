<?php
require_once('config/config.php');
    class User{
        public $id;
        public $username;
        public $name;
        public $email;
        public $phone;
        public $nation;
        public $birth;
        public $image;
        public $password;

        public function __construct($id, $username, $name, $email, $phone, $nation, $birth, $image, $password){
            $this->id = $id;
            $this->username = $username;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->nation = $nation;
            $this->birth = $birth;
            $this->image = $image;
            $this->password = $password;
        }

        public static function getAll(){
            $sql = 'SELECT * FROM USER';
            $db = DB::getDB();
            $stm = $db->query($sql);
            $data = array();
            while ($i = $stm->fetch_array()) {
                $data[] = new User($i['USER_ID'],$i['USERNAME'],$i['NAME'],$i['EMAIL'],$i['PHONE'],$i['NATION'],$i['BIRTH'],$i['IMAGE'],$i['PASSWORD']);
            }
            return $data;
        }

        public static function getSize(){
            $sql = 'SELECT MAX(ID) AS TOTALUSER FROM USER';
            $db = DB::getDB();
            $stm = $db->query($sql);
            return $stm->fetch_array();
        }

        public static function checkUserExist($mail){
            $check_user = 'SELECT * FROM USER WHERE EMAIL = ?';
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

        public static function checkLogin($mail,$pass){
            $check_user = 'SELECT * FROM USER WHERE EMAIL = ? AND PASSWORD = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('ss',$mail,$pass);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                return $data->num_rows;
            }
            $stm->close();
            return null;
        }

        public static function addUser($id,$username,$name,$email,$phone,$nation,$birth,$image,$password){
            $sql = 'INSERT INTO USER VALUES(?,?,?,?,?,?,?,?)';
            $db = DB::getDB();
            $total_user = User::getSize();
            $id = $total_user['TOTALUSER'] + 1;
            $stm = $db->prepare($sql);
            $stm->bind_param('isssssss', $id, $username, $name, $email, $phone, $nation, $birth, $image, $password);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function getCurrentUser($mail){
            $check_user = 'SELECT * FROM USER WHERE EMAIL = ?';
            $db = DB::getDB();
            $stm = $db->prepare($check_user);
            $stm->bind_param('s', $mail);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while( $i = $data->fetch_array())
                {
                    return new User($i['USER_ID'], $i['USERNAME'], $i['NAME'], $i['EMAIL'], $i['PHONE'], $i['NATION'], $i['BIRTH'], $i['IMAGE'], $i['PASSWORD']);
                }
            }
            $stm->close();
            return null;
        }

        public static function getUserById($id){
            $sql = 'SELECT * FROM USER WHERE USER_ID = ?';
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();

            if ($status) {
                $data = $stm->get_result();
                while ($i = $data->fetch_array()) {
                    return new User($i['USER_ID'], $i['USERNAME'], $i['NAME'], $i['EMAIL'], $i['PHONE'], $i['NATION'], $i['BIRTH'], $i['IMAGE'], $i['PASSWORD']);
                }
            }
            $stm->close();
            return null;
        }

        public static function changeUserInfo($id, $username, $name, $email, $phone, $nation, $birth, $image, $password)
        {
            $sql = "UPDATE USER SET USERNAME = ?, NAME = ?, EMAIL = ?, PHONE = ?, NATION = ?, BIRTH = ?, IMAGE = ?, PASSWORD = ? WHERE USER_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('ssssssssi', $username, $name, $email, $phone, $nation, $birth, $image, $password, $id);
            $result = $stm->execute();
            $stm->close();
            return $result;
        }

        public static function deleteUserById($id)
        {
            $sql = "DELETE FROM USER WHERE USER_ID = ?";
            $db = DB::getDB();
            $stm = $db->prepare($sql);
            $stm->bind_param('i', $id);
            $status = $stm->execute();
            $stm->close();
            return $status;
        }
    }
