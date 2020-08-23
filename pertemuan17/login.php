<?php
  require 'functions.php';

  if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek Username
    if (mysqli_num_rows($result) === 1) {
      // cek Password
      $row = mysqli_fetch_assoc($result);

      if (password_verify($password, $row["password"])) {
        header("Location: index.php");
        exit;
      }
    }

    $error = true;
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <title>Halaman Login</title>
  </head>
  <body>

    <h1>Halaman Login</h1>

    <?php if(isset($error)) : ?>
      <p style="color:red; font-style:italic;;">username atau password salah</p>
    <?php endif; ?>

    <form class="" action="" method="post">

      <ul>
        <li>
          <label for="username">Username :</label>
          <input type="text" name="username" value="" id="username">
        </li> <br>
        <li>
          <label for="password">Password :</label>
          <input type="password" name="password" value="" id="password">
        </li>
        <li>
          <button type="submit" name="login">Login</button>
        </li>
      </ul>


    </form>

  </body>
</html>
