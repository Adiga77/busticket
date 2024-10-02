<?php 
include_once('database.php');
class User extends Database{

    public function createUserAccount($username, $gender, $email, $phone, $password){
        $sql = "INSERT INTO users (name, gender, email, phone, password) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $gender, $email, $phone, $password]);

    }
    public function userPayment($username, $email, $phone, $gender, $route, $seat){
        $sql = "INSERT INTO bookings (fname, email, phone, gender, route, no_of_seat) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $phone, $gender, $route, $seat]);

    }

    public function 
         validateUserPayment($email){
        $sql = "SELECT payments.fullname, payments.amount, payments.status, payments.reference, payments.created, bookings.phone,bookings.route, bookings.no_of_seat FROM payments INNER JOIN bookings ON payments.email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getStudentsPayment(){
        $sql = "SELECT * FROM payments ORDER BY id DESC LIMIT 4";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getAllStudentsPayment(){
        $sql = "SELECT * FROM payments ORDER BY id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getStudentPaymentById($id){
        $sql = "SELECT * FROM payments WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function getStudents(){
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function getStudentEmail($email){
        $sql = "SELECT email FROM users WHERE email = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function selectUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetchAll();
        return $result;
    }
    
    public function getStudentPassword($email){
        $sql = "SELECT password FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

}

?>