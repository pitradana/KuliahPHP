<?php
  session_start();

  if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
  }

  require 'functions.php';

  // pagination
  // konfigurasi
  $jumlahDataPerHalaman = 2;
  // $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
  // $jumlahData = mysqli_num_rows($result);
  $jumlahData = count(query("SELECT * FROM mahasiswa"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
  // if (isset($_GET["Halaman"])) {
  //   $halamanAktif = $_GET["halaman"];
  // } else {
  //   $halamanAktif = 1;
  // }
  $halamanAktif =(isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
  $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

  $mhs = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

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
      <input type="text" name="keyword" size="40" autofocus placeholder="Masukan keyword pencarian.." autocomplete="off">
      <button type="submit" name="cari">Cari!</button>
    </form>
<br><br>


<!-- navigasi -->
<?php if($halamanAktif > 1) : ?>
  <a href="?halaman=<?= $halamanAktif-1; ?>">&lt;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
  <?php if($i == $halamanAktif) : ?>
    <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red"><?= $i; ?></a>
  <?php else : ?>
    <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
  <?php endif ?>
<?php endfor; ?>

<?php if($halamanAktif < $jumlahHalaman) : ?>
  <a href="?halaman=<?= $halamanAktif+1; ?>">&gt;</a>
<?php endif; ?>

    <br>
    <table border="1" cellpadding="10" cellspacing="0">

      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>NRP</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>


      <?php $i=1; ?>
      <?php foreach ($mhs as $row) : ?>
      <tr>
        <td><?= $i; ?></td>
        <td>
          <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
          <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin?');">hapus</a>
        </td>
        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
        <td><?= $row["nrp"] ?></td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["jurusan"] ?></td>
      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>

    </table>

  </body>
</html>
