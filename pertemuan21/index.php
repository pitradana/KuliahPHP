<?php
  session_start();

  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  require 'functions.php';
  $mhs = query("SELECT * FROM mahasiswa ORDER BY id DESC");

  // tombol cari ditekan
  if (isset($_POST["cari"])) {
    $mhs = cari($_POST["keyword"]);
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Admin</title>
  </head>
  <body>
      <a href="logout.php">Logout</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
      <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off" id="keyword">
      <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>


    <br>
    <div class="" id="container">
    
    </div>
<script src="js/script.js">

</script>
  </body>
</html>
