<?php
    if(!isset($_SESSION['auth_user'])){
        header('location:sign-in.php');
        exit(0);
    }

?>