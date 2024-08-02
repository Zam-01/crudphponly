<?php
$koneksi = mysqli_connect(
  "localhost",
  "root",
  "",
  "beban"
);

// cek koneksi 
if ($koneksi) {
} else {
  echo "koneksi gagal :" . mysqli_connect_error();
}
