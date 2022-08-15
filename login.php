<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}
if (isset($_POST["submit"])) {
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location:Project.html");
    }
    else {
      echo
        "<script> alert('Wrong Password'); </script>";
    }
  }
  else {
    echo
      "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="center">
      <h1>Login</h1>
      <form class="" action="" method="post" autocomplete="off">

        <div class="txt_field">
          <input type="text" name="usernameemail" id = "usernameemail" required value=""> 
          <span></span>
          <label for="usernameemail">Username or Email </label> 
        </div>

        <div class="txt_field">
          <input type="password" name="password" id = "password" required value="">
          <span></span>
          <label for="password">Password </label>
        </div>
        
        <!-- <button type="submit" name="submit">Login</button> -->
        <button type="submit" name="submit">Login</button>
        <div class="signup_link">
          Not a member? <a href="registration.php">Register</a>
        </div>
      </form>
    </div>

  </body>
</html>