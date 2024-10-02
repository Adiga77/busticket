<?php
if(isset($_SESSION['message'])){ ?>
    <p class="small"></p>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hey! </strong> <small><?=$_SESSION['message']; ?> </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" ></button>
    </div>
    <?php
    unset($_SESSION['message']);
 }

 if(isset($_SESSION['error'])){ ?>
    <p class="small"></p>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! </strong><small><?=$_SESSION['error']; ?> </small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close" ></button>
    </div>
    <?php
    unset($_SESSION['error']);
    
 }
 
?>