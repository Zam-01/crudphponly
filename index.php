<?php
include 'koneksi.php';
$no = 1;
// membuat pagination 
$jumlahdataperhalaman = 6;
$result =
  mysqli_query($koneksi, "SELECT * FROM data_beban");
//hitung jumlah data yang ada di dalam database
$jumlahData = mysqli_num_rows($result);
$jumlahHalaman = ceil($jumlahData / $jumlahdataperhalaman);

// cek kondisi  hallaman yang aktif dengan menggunakan pengkondisian ternary
$halamanaktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
//jumlah halaman = 1 awaldata = 0 - 4 
// jumlah halaman = 2 awaldata = 4- 8
//jumlah halamn = 3 awaldata = 8-12
$dataawal = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD BEBAN KELUARGA</title>
  <link rel="stylesheet" href="Mystyle/style.css">
</head>
<!-- style form di ubah disini karena tidak bisa diubah selain disini  -->
<style>
  ::placeholder {
    text-transform: capitalize;
    color: gray;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1em;
  }

  #cari {
    width: 40vh;
    position: relative;
    margin-top: 10vh;
    margin-left: 65%;
    margin-bottom: 0px;
    box-sizing: border-box;
  }

  #cari input {
    left: 40%;
    margin: 10px;
    padding: 5px 5px;
    width: 40vh;
    height: 25px;
    transform: translateY(-17px);
    border: 1px solid black;
    outline: 0px;
    border-radius: 10px;
    text-align: center;
    box-sizing: border-box;
  }

  #cari input:focus {
    box-shadow: 0px 0px 5px 0.5px rgb(79, 200, 248),
      0px 0px 10px 1px rgb(79, 200, 248), 0px 0px 15px 1.5px rgb(79, 200, 248);
  }

  #cari button {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1em;
    width: 100px;
    height: 34px;
    color: gray;
    background-color: #1FFF;
    position: absolute;
    right: -95%;
    transform: translateY(-5px);
    border-radius: 10px;
    border: 1px solid transparent;
    color: green;
    left: 55%;
  }

  .navigasi {
    margin: 10px;
    padding: 10px;
    width: 60vh;
    background-color: aqua;
    display: flex;
    justify-content: center;
  }
</style>

<body>
  <div class="container">
    <span class="add">
      <a href="add.php">+TAMBAH BEBAN</a>
    </span>
    <form action="" method="post" id="cari">
      <input type="text" name="caridata" id="cari" autofocus required placeholder="cari data anda disini">
      <button type="submit" name="tombolcari"> cari data</button>
    </form>
    <!-- navigasi -->
    <nav class="navigasi">
      <?php if ($halamanaktif == 1) : ?>
        <a href="?halaman=<?= $halamanaktif + 1; ?>">Next</a>
      <?php endif; ?>
      <br>
      <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanaktif) : ?>
          <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
        <?php else : ?>
          <a href="?halaman=<?= $i; ?>"><?= $i ?></a>
        <?php endif; ?>
      <?php endfor; ?>
      <br>
      <?php if ($halamanaktif == $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanaktif - 1; ?>">Back</a>
      <?php endif; ?>
    </nav>
    <table>
      <tr>
        <th id="no">#</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Alamat</th>
        <th>Umur</th>
        <th>Prestasi</th>
        <th>Opsi</th>
      </tr>
      <?php
      if (isset($_POST["tombolcari"])) {
        $cari = $_POST['caridata'];
        $data = mysqli_query($koneksi, "SELECT * FROM data_beban WHERE Nama LIKE '%$cari%' OR
        Nik LIKE '%$cari%' OR
        Alamat LIKE '%$cari%' OR
        Umur LIKE '%$cari%' OR
        Prestasi LIKE '%$cari%'
        ");
      } else {
        $data = mysqli_query($koneksi, "SELECT * FROM data_beban LIMIT $dataawal,$jumlahdataperhalaman");
      }

      while ($d = mysqli_fetch_array($data)) : ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $d['Nama']; ?></td>
          <td><?= $d['Nik']; ?></td>
          <td><?= $d['Alamat']; ?></td>
          <td><?= $d['Umur']; ?></td>
          <td><?= $d['Prestasi']; ?></td>
          <td>
            <a href="edit.php?id=<?= $d['id']  ?>">EDIT</a>
            <a href="hapus.php?id=<?= $d['id']; ?>">HAPUS</a>
          </td>
        </tr>
      <?php
      endwhile;
      ?>
    </table>
  </div>
</body>

</html>