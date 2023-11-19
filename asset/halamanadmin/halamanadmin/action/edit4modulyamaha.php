<?php

$kode = $_POST['kode'];
$thn = $_POST['thn'];
$wrna = $_POST['wrna'];
$hrga = $_POST['hrga'];
$tipem = $_POST['tipem'];
$modelm = $_POST['modelm'];
$spesifikasi = $_POST['spesifikasi'];
$id_yamaha = $_POST['id_yamaha'];

include "koneksi.php";
if ($_FILES['photo']['name'] != "") {

    // ambil nama photo lama
    $q = mysqli_query($koneksi, "SELECT photo FROM yamaha_motor WHERE kode='$kode'");
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
    mysqli_query($koneksi, "UPDATE yamaha_motor SET photo='$photoname' WHERE kode='$kode'");
}

// update dengan condition
mysqli_query($koneksi, "UPDATE yamaha_motor SET id_yamaha='$id_yamaha',thn='$thn', wrna='$wrna', hrga='$hrga', tipem='$tipem', modelm='$modelm', spesifikasi='$spesifikasi',photo = '$photoname' WHERE kode='$kode'");
// pindah kehalaman data.php
header("location:../modul4yamaha.php");
?>