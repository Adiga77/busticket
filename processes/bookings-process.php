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
        $route = htmlspecialchars($_POST['route']);
        $seat = htmlspecialchars($_POST['seat']);
        
        


        if(empty($username) || empty($email) || empty($phone) || empty($gender) || empty($route) || empty($seat)){
            $_SESSION['error'] = "All field required";
            header('location:../book.php');
            exit(0);
        } else {
            $user->userPayment($username, $email, $phone, $gender, $route, $seat);
            $_SESSION['message'] = "Proceed to make payment";
            header('location:../payment.php');
            exit(0);
            
        }

    }else{
        header('location:../sign-in.php');
        exit(0);
    }
?>