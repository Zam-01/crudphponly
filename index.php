<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD BEBAN KELUARGA</title>
  <link rel="stylesheet" href="Mystyle/style.css">
</head>

<body>
  <div class="container">
    <span class="add">
      <a href="add.php">+TAMBAH BEBAN</a>
    </span>
    <br>
    <table>
      <tr>
        <th id="no">
          #
        </th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Alamat</th>
        <th>Umur</th>
        <th>Prestasi</th>
        <th>Opsi</th>
      </tr>
      <?php
      include 'koneksi.php';
      $no = 1;
      $data = mysqli_query($koneksi, "SELECT * FROM data_beban");
      while ($d = mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $d['Nama']; ?></td>
          <td><?= $d['Nik']; ?></td>
          <td><?= $d['Alamat']; ?></td>
          <td><?= $d['Umur']; ?></td>
          <td><?= $d['Prestasi']; ?></td>
          <td>
            <a href="edit.php?id=<?= $d['id']  ?>">EDIT</a>
            <a href="">HAPUS</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
  </div>
</body>

</html>