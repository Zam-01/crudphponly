<?php
include 'koneksi.php';



// simpan inputan kedalam variabel post
$nama  = $_POST['Nama'];
$nik = $_POST['Nik'];
$alamat  = $_POST['Alamat'];
$umur  = $_POST['Umur'];
$prestasi  = $_POST['Prestasi'];

// simpan kedatabase 

$insert = mysqli_query($koneksi, "INSERT INTO data_beban

VALUES('','$nama','$nik','$alamat','$umur','$prestasi')
");
header("location:index.php");
