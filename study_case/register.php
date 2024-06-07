<?php

// Error reporting (enable during development, disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'function.php'; // Include function file

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>alert('User baru berhasil ditambahkan!');</script>";
        // Redirect to login page or another page after successful registration
        header('Location: login.php');
        exit();
    } else {
      header('Location: login.php');
    }
}

?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="stylesRegister.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  </head>
  <body>  
    <div class="register">

        <div class="avatar">
            <i class="fa fa-user"></i>
        </div>

          <h2>Register Form</h2>

<form action="" method="post">

          <div class="box-register">
            <i class="fas fa-envelope-open-text"></i>
            <input type="text" name="username" id="username" placeholder="Username Baru" required>
          </div>

          <div class="box-register">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Password Baru" required>
          </div>

          <div class="box-register">
            <i class="fas fa-lock"></i>
            <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password Baru" required>
          </div>

          <div class="box-register">
            <i class="fas fa-user-circle"></i>
              <select name="role" id="role" style="background-color: transparent;">
                <option value="managerPengadaan">Manager Pengadaan</option>
                <option value="vendor">Vendor</option>
                <option value="managerProyek">Manager Proyek</option>
              </select>
          </div>

          <button type="submit" name="register" class="btn-register">Register!</button>

        </form>

          <div class="bottom">
            <a href="login.php">Sudah punya akun</a>
          </div>

      </div>
  </body>
  
  </html>