<?php
session_start();
include_once('../../classes/Admin.php');
if(isset($_POST['submit'])){
    $uname = htmlspecialchars($_POST['uname']);
    $pwd = htmlspecialchars($_POST['pwd']);
    $cpwd = htmlspecialchars($_POST['cpwd']);

    if(empty($uname) || empty($pwd) || empty($cpwd)){
        $_SESSION['error'] = "all field required";
        header('location:../admin.php');
        exit();

    }else{
        if($pwd == $cpwd){
            if(strlen($pwd) <= 5){
                $_SESSION['error'] = "password length must be greater than 5";
                header('location:../admin.php');
                exit();
            }else {
                $admin = new Admin();
                $hashPassword = password_hash($pwd, PASSWORD_DEFAULT);
                $admin->updateAdminpassword($hashPassword, $uname);
                $_SESSION['message'] = "password updated successfully";
                header('location:../admin.php');
                exit();
            }
        }else {
            $_SESSION['error'] = "password mismatch";
            header('location:../admin.php');
            exit();
        }
    }

    
}