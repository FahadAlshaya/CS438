<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}
if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($duplicate) > 0) {
    echo
      "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else {
    if ($password == $confirmpassword) {
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
        "<script> alert('Registration Successful'); </script>";
    }
    else {
      echo
        "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="js\main.js" defer></script>

  </head>
  <body>
   
  <div class="center">
      <h1>Registration</h1>
      <div id ="error"></div>
      <form id="form" class="" action="" method="post" autocomplete="off">

        <div class="txt_field">
            <input type="text" name="name" id = "name" required value="">
          <span></span>
          <label for="name"> Name </label>
        </div>

        <div class="txt_field">
            <input type="text" name="username" id = "username" required value="">
          <span></span>
          <label for="username">Username  </label>
        </div>

        <div class="txt_field">
            <input type="email" name="email" id = "email" required value="">
          <span></span>
          <label for="email">Email  </label>
        </div>

        <div class="txt_field">
          <input type="password" name="password" id = "password" required value="">
          <span></span>
          <label for="password">Password </label>
        </div>

        <div class="txt_field">
            <input type="password" name="confirmpassword" id = "confirmpassword" required value="">
            <span></span>
            <label for="confirmpassword">Confirm Password  </label>
          </div>
    
        
          <button type="submit" name="submit">Register</button>
        <div class="signin_link">
          You Have An Account ? <a href="login.php">Sing in</a>
        </div>
      </form>
    </div>

  </body>