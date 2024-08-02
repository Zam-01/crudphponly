<?php
include 'koneksi.php';

//simpan ke variabel get kalau dihapus

$id = $_GET['id'];

//query hapus data

$delete = mysqli_query($koneksi, "DELETE FROM data_beban WHERE id='$id' ");

if ($delete) {
  echo " data berhasil di hapus";
  header("location:index.php");
} else {
  echo " coba lagi ";
}
