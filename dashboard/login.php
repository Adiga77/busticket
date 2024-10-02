<?php
session_start();
include('../classes/User.php');
include('../classes/Admin.php');
$user = new User();
$admin = new Admin();
if(isset($_POST['submit'])){
    
    $username = htmlspecialchars($_POST['username']);
    $pwd = htmlspecialchars($_POST['password']);
    $rank = htmlspecialchars($_POST['login-as']);
    $adminUserName = $username;
    $registeredAdmin = $admin->selectAdminByUsername($adminUserName);


    if(empty($username) || empty($pwd) || empty($rank)){
        
        $_SESSION['error'] = "All field required";
        header('location:login.php?1');
        exit();
    } else {
        // Admin validation
        if($rank == "Admin"){
            if($registeredAdmin){
                //verifying admin password here
                $admin_pwd = $admin->selectAdminPassword($adminUserName);
                $password = implode("", $admin_pwd); //converting array to string
                if(password_verify($pwd, $password)){ // verifying password
                    $_SESSION['admin'] = $adminUserName;
                    header('location:index.php');
                }else{
                    $_SESSION['error'] = "incorrect password";
                    header('location:login.php');
                    exit();
                }
            }else{
                $_SESSION['error'] = "invalid user credentials";
                header('location:login.php');
                exit();
            }

        }
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K-Tranport | Admin Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-section">
        <div class="mb-3 mt-3">
            <?php include_once('../message.php'); ?>
        </div>
        <div class="container text-light py-5 shadow-lg" style="border-radius:4px; background-color:#1f2e4e;">
            <div class="row">
                <div class="col-md-6">
                    <img src="../img/bus1-rem.png" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Admin Login</h3>
                            <form action="" method="post">
                                <div class="form-group mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>
                                <div class="form-group mb-3">
                                    <select name="login-as" class="form-control">
                                        <option>Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>