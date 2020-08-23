<?php
require 'functions.php';

//ambil data dari URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
  if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
      // code...
      echo "
        <script>
          alert('Data berhasil diubah!');
          document.location.href = 'index.php';
        </script>
      ";
    }else {
      echo "
        <script>
          alert('Data gagal diubah!');
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
    <title>Ubah Data mahasiswa</title>
  </head>
  <body>
    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
      <ul>
        <li>
          <label for="nrp">NRP : </label>
          <input type="text" name="nrp" id="nrp" value="<?= $mhs["nrp"] ?>" required >
        </li>
        <br>
        <li>
          <label for="nama">Nama : </label>
          <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>" required>
        </li>
        <br>
        <li>
          <label for="email">Email : </label>
          <input type="text" name="email" id="email" value="<?= $mhs["email"] ?>" required>
        </li>
        <br>
        <li>
          <label for="jurusan">Jurusan : </label>
          <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>" required>
        </li>
        <br>
        <li>
          <label for="gambar">Gambar : </label>
          <img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
          <input type="file" name="gambar" id="gambar">
        </li>
        <br>
        <li>
          <button type="submit" name="submit">Ubah data!</button>
        </li>
      </ul>
    </form>

  </body>
</html>
