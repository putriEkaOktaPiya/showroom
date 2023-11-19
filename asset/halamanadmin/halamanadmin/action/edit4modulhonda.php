<?php

$kode = $_POST['kode'];
$tahun = $_POST['tahun'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];
$tipe = $_POST['tipe'];
$model = $_POST['model'];
$spesifikasi = $_POST['spesifikasi'];
$id_honda = $_POST['id_honda'];

include "koneksi.php";
if ($_FILES['photo']['name'] != "") {

    // ambil nama photo lama
    $q = mysqli_query($koneksi, "SELECT photo FROM honda_motor WHERE kode='$kode'");
    $dt = mysqli_fetch_array($q);
    $photo = $dt['photo'];

    // hapus photo lama
    unlink('../image/'.$photo);

    // upload photo baru
    $path = $_FILES['photo']['name'];
    $ext = "." . pathinfo($path, PATHINFO_EXTENSION);
    $photoname = md5(time()) . $ext;
    move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $photoname);

    // update nama photo ke photo baru
    mysqli_query($koneksi, "UPDATE honda_motor SET photo='$photoname' WHERE kode='$kode'");
}

// update dengan condition
mysqli_query($koneksi, "UPDATE honda_motor SET id_honda='$id_honda',tahun='$tahun', warna='$warna', harga='$harga', tipe='$tipe', model='$model', spesifikasi='$spesifikasi',photo = '$photoname' WHERE kode='$kode'");
// pindah kehalaman data.php
header("location:../modul4honda.php");
?>