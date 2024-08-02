<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form ubah data</title>
  <link rel="stylesheet" href="Mystyle/add.css">
</head>

<body>
  <div class="container">
    <h2> UBAH DATA ANDA DISINI</h2>
    <br>
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * FROM data_beban WHERE id ='$id' ");
    while ($d = mysqli_fetch_array($data)) {

    ?>
      <form method="post" action="update.php" id="create">
        <div class="form-register">
          <div class="nama">
            <label for="Nama">Nama => </label>
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <input type="text" name="Nama" id="Nama" value="<?= $d['Nama']; ?>">
          </div>
          <br>
          <div class="nik">
            <label for="Nik">Nik => </label>
            <input type="number" name="Nik" id="Nik" value="<?= $d['Nik']; ?>">
          </div>
          <br>
          <div class="alamat">
            <label for="Alamat">Alamat => </label>
            <textarea name="Alamat" id="Alamat" value=""><?= $d['Alamat']; ?></textarea>
          </div>
          <br>
          <div class="umur">
            <label for="Umur">Umur => </label>
            <input type="number" name="Umur" id="Umur" value="<?= $d['Umur']; ?>">
          </div>
          <br>
          <div class="prestasi">
            <label for="Prestasi">Prestasi => </label>
            <textarea name="Prestasi" id="Prestasi" value=""><?= $d['Prestasi']; ?></textarea>
          </div>
        </div>
        <br>
        <div class="tombol">
          <a href="index.php">
            <=kembali </a>
              <br>
              <button type="submit"> kirim = ></button>
        </div>
      </form>
  </div>
<?php

    }
?>
</body>

</html>