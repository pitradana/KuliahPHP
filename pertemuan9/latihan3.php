<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>POST</title>
  </head>
  <body>
    <?php if (isset($_POST["submit"])) : ?>
      <h1>Halo, Selamat Data <?= $_POST["nama"]; ?></h1>
    <?php endif; ?>

    <form action="" method="post">
      Masukan nama :
      <input type="text" name="nama">
      <br>
      <button type="submit" name="submit">KIRIM!</button>
    </form>
  </body>
</html>
