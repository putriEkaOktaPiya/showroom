<?php

// ambil semua value dari form
$kode = $_POST['kode_brand'];
$brand = $_POST['brand'];
$id_brand = $_POST['id_brand'];
// koneksi
include "koneksi.php";
if ($_FILES['photo']['name'] != "") {

    // ambil nama photo lama
    $q = mysqli_query($koneksi, "SELECT photo FROM brand_motor WHERE id_brand='$id_brand'");
    $dt = mysqli_fetch_array($q);
    $photo = $dt['photo'];
 
    // hapus photo lama
    unlink('../image/'.$photo);

    // upload photo baru
    $path = $_FILES['photo']['name'];
    $ext = "." . pathinfo($path, PATHINFO_EXTENSION);
    $namaphoto = md5(time()) . $ext;
    move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $namaphoto);

    // update nama photo ke photo baru
    mysqli_query($koneksi, "UPDATE brand_motor SET photo='$namaphoto' WHERE id_brand='$id_brand'");
}
// update dengan condition
mysqli_query($koneksi, "UPDATE brand_motor SET kode_brand='$kode', brand = '$brand', photo = '$namaphoto' WHERE id_brand='$id_brand'");
// pindah kehalaman data.php
header("location:../editmodul1.php");