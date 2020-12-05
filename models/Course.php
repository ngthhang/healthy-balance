<?php
require_once('config/config.php');
class Course
{
    public $id;
    public $name;
    public $description;
    public $date;
    public $start_time;
    public $end_time;
    public $place;
    public $available;
    public $slot;
    public $payment;
    public $price;
    public $discount;
    public $pt_id;

    public function __construct($id, $name, $description, $date, $start_time, $end_time, $place, $available, $slot, $payment, $price, $discount, $pt_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->date = $date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->place = $place;
        $this->available = $available;
        $this->slot = $slot;
        $this->payment = $payment;
        $this->price = $price;
        $this->discount = $discount;
        $this->pt_id = $pt_id;
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM COURSE';
        $db = DB::getDB();
        $stm = $db->query($sql);
        $data = array();
        while ($i = $stm->fetch_array()) {
            $data[] = new Course($i['COURSE_ID'], $i['NAME'], $i['DESCRIPTION'], $i['DATE'], $i['START_TIME'], $i['END_TIME'], $i['PLACE'], $i['AVAILABLE'], $i['SLOT'], $i['PAYMENT'],$i['PRICE'], $i['DISCOUNT'], $i['PT_ID']);
        }
        return $data;
    }

    public static function getSize()
    {
        $sql = 'SELECT MAX(COURSE_ID) AS TOTALCOURSE FROM COURSE';
        $db = DB::getDB();
        $stm = $db->query($sql);
        return $stm->fetch_array();
    }

    public static function getCourseAvailable()
    {
        $sql = 'SELECT * FROM COURSE WHERE AVAILABLE > SLOT';
        $db = DB::getDB();
        $stm = $db->query($sql);
        $data = array();
        while ($i = $stm->fetch_array()) {
            $data[] = new Course($i['COURSE_ID'], $i['NAME'], $i['DESCRIPTION'], $i['DATE'], $i['START_TIME'], $i['END_TIME'], $i['PLACE'], $i['AVAILABLE'], $i['SLOT'], $i['PAYMENT'], $i['PRICE'], $i['DISCOUNT'], $i['PT_ID']);
        }
        return $data;
    }

    public static function addCourse($name, $description, $date, $start_time, $end_time, $place, $available, $payment, $price, $discount, $pt_id)
    {
        $sql = "INSERT INTO COURSE VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $db = DB::getDB();
        $total_course = Course::getSize();
        $id = $total_course['TOTALCOURSE'] + 1;
        $slot = 0;
        $stm = $db->prepare($sql);
        $stm->bind_param('issssssiiiiii', $id, $name, $description, $date, $start_time, $end_time, $place, $available, $slot, $payment, $price, $discount, $pt_id);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function getCourseById($id)
    {
        $sql = 'SELECT * FROM COURSE WHERE COURSE_ID = ?';
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $id);
        $status = $stm->execute();
        if ($status) {
            $result = $stm->get_result();
            while ($i = $result->fetch_array()) {
                return new Course($i['COURSE_ID'], $i['NAME'], $i['DESCRIPTION'], $i['DATE'], $i['START_TIME'], $i['END_TIME'], $i['PLACE'], $i['AVAILABLE'], $i['SLOT'], $i['PAYMENT'], $i['PRICE'], $i['DISCOUNT'], $i['PT_ID']);
            }
        }
        $stm->close();
        return null;
    }

    public static function updateCourseById($id, $name, $description, $date, $start_time, $end_time, $place, $available, $payment, $price, $discount, $pt_id){
        $sql = "UPDATE COURSE SET NAME = ?, DESCRIPTION = ?, DATE = ?, START_TIME = ?, END_TIME = ?, PLACE = ?, AVAILABLE = ?, PAYMENT = ?, PRICE = ?, DISCOUNT = ?, PT_ID = ? WHERE COURSE_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('ssssssiiiiii', $name, $description, $date, $start_time, $end_time, $place, $available, $payment, $price, $discount, $pt_id, $id);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function updateSlotById($id, $slot)
    {
        $sql = "UPDATE COURSE SET SLOT = ? WHERE COURSE_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('ii', $slot, $id);
        $result = $stm->execute();
        $stm->close();
        return $result;
    }

    public static function deleteCourseById($id)
    {
        $sql = "DELETE FROM COURSE WHERE COURSE_ID = ?";
        $db = DB::getDB();
        $stm = $db->prepare($sql);
        $stm->bind_param('i', $id);
        $status = $stm->execute();
        $stm->close();
        return $status;
    }
}
