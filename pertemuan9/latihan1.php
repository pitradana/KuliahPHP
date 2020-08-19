<?php
// $_GET

$mahasiswa = [
  [
      "nrp" => "1111111",
      "nama" => "Pitra Dana",
      "email" => "pitradana@live.com",
      "jurusan" => "Teknik Informatika",
      "gambar" => "pitra.jpg"
  ],
  [
    "nrp" => "2222222",
    "nama" => "Dana Arista",
    "email" => "pitradana@gmail.com",
    "jurusan" => "Teknik Informatika",
    "gambar" => "pitra1.jpg"
  ]
];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GET</title>
  </head>
  <body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
      <?php foreach ($mahasiswa as $mhs) : ?>
        <li>
          <a href="latihan2.php?nama=<?= $mhs["nama"]; ?>
            &nrp=<?= $mhs["nrp"]; ?>
            &email=<?= $mhs["email"]; ?>
            &jurusan=<?= $mhs["jurusan"]; ?>
            &gambar=<?= $mhs["gambar"] ?>"><?= $mhs["nama"]; ?></a>
        </li>
      <?php endforeach; ?>
    </body>
    </ul>
</html>
