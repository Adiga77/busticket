<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign-Up | K-Transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="dashboard/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sign-in.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto shadow-lg">
      <form action="processes/signup-process.php" method="post">
          <div class="mt-3 mb-3">
            <?php include_once('message.php'); ?>
          </div>
          <div class="form-floating mb-1">
            <input type="text" class="form-control" name="username" id="floatingInput" required>
            <label for="floatingInput">Name</label>
          </div>
          <div class="form-floating mb-1">
            <input type="tel" class="form-control" maxlength="11" name="phone" id="floatingInput" required>
            <label for="floatingInput">Phone</label>
          </div>
          <div class="form-floating mb-1">
            <input type="email" class="form-control" name="email" id="floatingInput" required>
            <label for="floatingInput">Email</label>
          </div>  
            <div class="form-floating mb-1">
            <select name="gender" class="form-select" id="">
                <option selected disabled></option>
                <option>Female</option>
                <option>Male</option>
            </select>
            <label for="floatingInputGrid">Gender</label>
            </div>
          <div class="form-floating mb-1">
            <input type="password" class="form-control" name="password" id="floatingPassword" required>
            <label for="floatingPassword">Password</label>
          </div>

          <button type="submit" name="submit" class="sign-in-btn w-100 py-2">Sign Up</button>
          <div class="mt-1">
            <p class="mt-5 mb-3 text-body-secondary">Do you have an account? <a href="sign-in.php">sign in</a></p>
          </div>
      </form>
    </main>
    <script src="dashboard/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
