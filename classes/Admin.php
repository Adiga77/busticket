<?php 
include_once('database.php');
class Admin extends Database {
    // insert into admins table
    public function users($fullname, $amount, $status, $reference, $email, $date_time){
        $sql = "INSERT INTO payments (fullname, amount, status, reference, email, created) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fullname, $amount, $status, $reference, $email, $date_time]);

    }

    public function addContents($name, $admission_number, $dpt, $email, $message){
        $sql = "INSERT INTO contents (name, admission_number, department, email, message) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $admission_number, $dpt, $email, $message]);
    }

    public function addAdmin($uname, $tel, $pwd_hash){
        $sql = "INSERT INTO admins (name, phone, password) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uname, $tel, $pwd_hash]);

    }

      // update  admin detail
    protected function updateLecturerInfo($uname, $tel, $dpt,  $courseAlloc, $id){
        $sql = "UPDATE lecturers SET username = ?, telephone = ?, department = ?, course_allocation = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$uname,$tel, $dpt,  $courseAlloc,  $id]);
        return $result;
    }

      // update admin password
    public function updateAdminpassword($hassedPassword, $uname){
        $sql = "UPDATE admins SET password = ? WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$hassedPassword, $uname]);
        return $result;
    }
      // update admin info
    public function updateAdminInfo($name, $phone, $id){
        $sql = "UPDATE admins SET name = ?, phone = ? WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name, $phone, $id]);
        return $result;
    }
    
    // method to get admin
    public function getAllAdmin(){
        $sql = "SELECT * FROM admins";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
    // delete admin
    public function deleteAdmin($id){
        $sql = "DELETE FROM admins WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }


    public function totalPayment(){
        $sql = "SELECT SUM(amount)  FROM payments";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function totalStudents(){
        $sql = "SELECT COUNT(*) FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function totalMale(){
        $sql = "SELECT COUNT(*) FROM users WHERE gender = 'Male'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function totalFemale(){
        $sql = "SELECT COUNT(*) FROM users WHERE gender = 'Female'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function selectAdminPassword($uname){
        $sql = "SELECT password FROM admins WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uname]);
        $result = $stmt->fetch();
        return $result;
    }

    public function selectAdminByUsername($uname){
        $sql = "SELECT * FROM admins WHERE name = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uname]);
        $result = $stmt->fetchAll();
        return $result;
    }

}

?>