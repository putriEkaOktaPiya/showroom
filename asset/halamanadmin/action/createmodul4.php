<?php


$path = $_FILES['photo']['name'];
$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
$photo = md5(time()) . $ext;
move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $photo);


$kode = $_POST['kode'];
$tahun_motor = $_POST['tahun_motor'];
$warna_motor = $_POST['warna_motor'];
$harga_motor = $_POST['harga_motor'];
$tipe_motor = $_POST['tipe_motor'];
$model_motor = $_POST['model_motor'];
$spesifikasi = $_POST['spesifikasi'];
$id_suzuki = $_POST['id_suzuki'];


$query = "INSERT INTO suzuk_motor (kode,id_suzuki, tahun_motor, warna_motor, harga_motor, tipe_motor, model_motor, spesifikasi, photo) 
        VALUES ('$kode','$id_suzuki','$tahun_motor','$warna_motor','$harga_motor','$tipe_motor','$model_motor','$spesifikasi','$photo')";

include "koneksi.php";

if ($query) {
    echo "<script>
            alert('Data berhasil ditambahkan !');
            document.location='../modul4.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan !');
    document.location='../modul4.php';
    </script>";
}

mysqli_query($koneksi, $query);
?>