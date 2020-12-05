<?php
require_once('config/config.php');
class Bill
{
    public $id;
    public $user_id;
    public $date;
    public $payment;
    public $course_id;
    public $discount;
    public $fee;

    public function __construct($id, $user_id, $date, $payment, $course_id, $discount, $fee)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->date = $date;
        $this->payment = $payment;
        $this->course_id = $course_id;
        $this->discount = $discount;
        $this->fee = $fee;
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM BILL';
        $db = DB::getDB();
        $stm = $db->query($sql);
        $data = array();
        while ($i = $stm->fetch_array()) {
            $data[] = new Bill($i['BILL_ID'], $i['USER_ID'], $i['DATE_PAYMENT'], $i['PAYMENT'], $i['COURSE_ID'], $i['DISCOUNT'], $i['FEE']);
        }
        return $data;
    }

    public static function getSize()
    {
        $sql = 'SELECT MAX(BILL_ID) AS TOTALBILL FROM BILL';
        $db = DB::getDB();
        $stm = $db->query($sql);
        return $stm->fetch_array();
    }

    public static function getAllBillByUserId($user_id){
        $sql = 'SELECT * FROM BILL WHERE USER_ID = ?';
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $user_id);
        $status = $stm->execute();
        $data = array();
        if ($status) {
            $result = $stm->get_result();
            while ($i = $result->fetch_array()) {
                $data[] = new Bill($i['BILL_ID'], $i['USER_ID'], $i['DATE_PAYMENT'], $i['PAYMENT'], $i['COURSE_ID'], $i['DISCOUNT'], $i['FEE']);
            }
            return $data;
        }
        $stm->close();
        return null;
    }

    public static function addBill($user_id, $payment, $course_id, $discount, $fee){
        $sql = "INSERT INTO BILL VALUES(?,?,?,?,?,?,?)";
        $db = DB::getDB();
        $total_bill = Bill::getSize();
        $id = $total_bill['TOTALBILL'] + 1;
        date_default_timezone_set('Etc/GMT-7');
        $date = date('Y-m-d h:i:s', time());
        $stm = $db->prepare($sql);
        $stm->bind_param('iisiiii', $id, $user_id, $date, $payment, $course_id, $discount, $fee);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function getBillById($id){
        $sql = 'SELECT * FROM BILL WHERE BILL_ID = ?';
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $id);
        $status = $stm->execute();
        if ($status) {
            $result = $stm->get_result();
            while ($i = $result->fetch_array()) {
                return new Bill($i['BILL_ID'], $i['USER_ID'], $i['DATE_PAYMENT'], $i['PAYMENT'], $i['COURSE_ID'], $i['DISCOUNT'], $i['FEE']);
            }
        }
        $stm->close();
        return null;
    }
}