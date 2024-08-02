<?php
include 'koneksi.php';



// simpan inputan kedalam variabel post
$id = $_POST['id'];
$nama  = $_POST['Nama'];
$nik = $_POST['Nik'];
$alamat  = $_POST['Alamat'];
$umur  = $_POST['Umur'];
$prestasi  = $_POST['Prestasi'];

// simpan kedatabase 

$insert = mysqli_query($koneksi, "UPDATE  data_beban SET Nama='$nama',Nik='$nik',Alamat='$alamat',Umur='$umur',Prestasi='$prestasi' 
WHERE id='$id'

");
header("location:index.php");
