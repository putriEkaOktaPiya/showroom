<?php

$kode = $_POST['kode'];
$tahun_motor = $_POST['tahun_motor'];
$warna_motor = $_POST['warna_motor'];
$harga_motor = $_POST['harga_motor'];
$tipe_motor = $_POST['tipe_motor'];
$model_motor = $_POST['model_motor'];
$spesifikasi = $_POST['spesifikasi'];
$id_suzuki = $_POST['id_suzuki'];

include "koneksi.php";
if ($_FILES['photo']['name'] != "") {

    // ambil nama photo lama
    $q = mysqli_query($koneksi, "SELECT photo FROM suzuk_motor WHERE kode='$kode'");
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
    mysqli_query($koneksi, "UPDATE suzuk_motor SET photo='$photoname' WHERE kode='$kode'");
}

// update dengan condition
mysqli_query($koneksi, "UPDATE suzuk_motor SET id_suzuki='$id_suzuki',tahun_motor='$tahun_motor', warna_motor='$warna_motor', harga_motor='$harga_motor', tipe_motor='$tipe_motor', model_motor='$model_motor', spesifikasi='$spesifikasi',photo = '$photoname' WHERE kode='$kode'");
// pindah kehalaman data.php
header("location:../modul4.php");
?>