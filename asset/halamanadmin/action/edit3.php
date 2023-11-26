<?php

$kode_motor = $_POST['kode_motor'];
$tipe_motor = $_POST['tipe_motor'];
$brand_motor = $_POST['brand_motor'];
$model_motor = $_POST['model_motor'];
$id_motor = $_POST['id_motor'];

include "koneksi.php";
if ($_FILES['photo_motor']['name'] != "") {

    // ambil nama photo_motor lama
    $q = mysqli_query($koneksi, "SELECT photo_motor FROM model_motor WHERE id_motor='$id_motor'");
    $dt = mysqli_fetch_array($q);
    $photo_motor = $dt['photo_motor'];

    // hapus photo_motor lama
    unlink('../image/'.$photo_motor);

    // upload photo_motor baru
    $path = $_FILES['photo_motor']['name'];
    $ext = "." . pathinfo($path, PATHINFO_EXTENSION);
    $photoname = md5(time()) . $ext;
    move_uploaded_file($_FILES['photo_motor']['tmp_name'], '../image/' . $photoname);

    // update nama photo ke photo baru
    mysqli_query($koneksi, "UPDATE model_motor SET photo_motor='$photoname' WHERE id_motor='$id_motor'");
}

// update dengan condition
mysqli_query($koneksi, "UPDATE model_motor SET kode_motor='$kode_motor', tipe_motor='$tipe_motor', brand_motor='$brand_motor', model_motor='$model_motor', photo_motor = '$photoname' WHERE id_motor='$id_motor'");
// pindah kehalaman data.php
header("location:../modul2.php");
?>