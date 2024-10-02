<?php
session_start();
include_once('../../classes/Admin.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $admin = new Admin();
    $admin->deleteAdmin($id);
    $_SESSION['message'] = "deleted Succesfully";
    header('location:../admin.php');
}
?>