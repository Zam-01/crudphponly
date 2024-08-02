<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>form add </title>
  <link rel="stylesheet" href="Mystyle/add.css">
</head>

<body>
  <div class="container">
    <h2> ISI DATA ANDA DISINI</h2>
    <br>
    <form method="post" action="tambah_aksi.php" id="create">
      <div class="form-register">
        <div class="nama">
          <label for="Nama">Nama => </label>
          <input type="text" name="Nama" id="Nama">
        </div>
        <br>
        <div class="nik">
          <label for="Nik">Nik => </label>
          <input type="number" name="Nik" id="Nik">
        </div>
        <br>
        <div class="alamat">
          <label for="Alamat">Alamat => </label>
          <textarea name="Alamat" id="Alamat"></textarea>
        </div>
        <br>
        <div class="umur">
          <label for="Umur">Umur => </label>
          <input type="number" name="Umur" id="Umur">
        </div>
        <br>
        <div class="prestasi">
          <label for="Prestasi">Prestasi => </label>
          <textarea name="Prestasi" id="Prestasi"></textarea>
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
</body>

</html>