<?php
session_start();
include_once('../../classes/Admin.php');
$adminModel = new Admin();



if(isset($_POST['submit'])){
    $uname = htmlspecialchars($_POST['admUname']);
    $tel = htmlspecialchars($_POST['admTel']);
    $pwd = htmlspecialchars($_POST['admPwd']);
    $pwd_hash = password_hash($pwd, PASSWORD_DEFAULT);
    $admin = $adminModel->selectAdminPassword($uname);

    if(!empty($uname) && !empty($tel) && !empty($pwd_hash)){
        if(!$admin){
            $adminModel->addAdmin($uname, $tel, $pwd_hash);
            $_SESSION['message'] = "Successfully added";
            header('location:../add-admin.php');
        }else{
            $_SESSION['error'] = "User with this name already exist";
            header('location:../add-admin.php');
        }
    }else{
        $_SESSION['error'] = "All field required";
        header('location:../add-admin.php');
    }
}
?>