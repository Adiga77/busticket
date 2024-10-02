<?php
    session_start();
    include('../classes/User.php');
    $user = new User();
   
    if(isset($_POST['submit'])){
        // student
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);
        $pwd = htmlspecialchars($_POST['password']);
        $password = password_hash($pwd, PASSWORD_DEFAULT);
        $student = $user->selectUserByEmail($email);
        


        if(empty($username) || empty($email) || empty($phone) || empty($password) || empty($gender)){
            $_SESSION['error'] = "All field required";
            header('location:../sign-up.php');
            exit(0);
        } else {
            if(!$student){
                if(strlen($pwd) >= 5 ){
                    $user->createUserAccount($username, $gender, $email, $phone, $password);
                    $_SESSION['message'] = "Registration Successful";
                    header('location:../sign-in.php');
                    exit(0);
                }else{
                    $_SESSION['error'] = "password too short";
                    header('location:../sign-up.php');
                    exit(0);
                }
            }else{
                $_SESSION['error'] = "Email already exist";
                header('location:../sign-up.php');
                exit(0);
            }
            
        }

    }else{
        header('location:../sign-in.php');
        exit(0);
    }
?>