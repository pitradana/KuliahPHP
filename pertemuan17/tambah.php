<?php
require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
  if (isset($_POST["submit"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
      // code...
      echo "
        <script>
          alert('Data berhasil ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";
    }else {
      echo "
        <script>
          alert('Data gagal ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tambah Data mahasiswa</title>
  </head>
  <body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="nrp">NRP : </label>
          <input type="text" name="nrp" id="nrp" required>
        </li>
        <br>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama" required>
        </li>
        <br>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email">
        </li>
        <br>
        <li>
          <label for="jurusan">Jurusan : </label>
          <input type="text" name="jurusan" id="jurusan">
        </li>
        <br>
        <li>
          <label for="gambar">Gambar : </label>
          <input type="file" name="gambar" id="gambar">
        </li>
        <br>
        <li>
          <button type="submit" name="submit">Tambah data!</button>
        </li>
      </ul>
    </form>

  </body>
</html>
