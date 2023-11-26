<?php
// ambil nim dari url variable
$id_brand = $_REQUEST['id_brand'];
// koneksi
include "action/koneksi.php";
// ambil nama photo
$q = mysqli_query($koneksi, "SELECT photo FROM brand_motor WHERE id_brand='$id_brand'");
$dt = mysqli_fetch_array($q);
$photo = $dt['photo'];
// hapus file nya
unlink('image/' . $photo);
// jalankan query delete dengan condition nim=nimnya
mysqli_query($koneksi, "DELETE FROM brand_motor WHERE id_brand='$id_brand'");
// kembalikan ke halaman data.php
header('location:modul1.php');
?>

