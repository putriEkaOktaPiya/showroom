<?php


$path = $_FILES['photo']['name'];
$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
$photo = md5(time()) . $ext;
move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $photo);


$kode = $_POST['kode'];
$tahun = $_POST['tahun'];
$warna = $_POST['warna'];
$harga = $_POST['harga'];
$tipe = $_POST['tipe'];
$model = $_POST['model'];
$spesifikasi = $_POST['spesifikasi'];
$id_honda = $_POST['id_honda'];


$query = "INSERT INTO honda_motor (kode,id_honda, tahun, warna, harga, tipe, model, spesifikasi, photo) 
        VALUES ('$kode','$id_suzuki','$tahun','$warna','$harga','$tipe','$model','$spesifikasi','$photo')";

include "koneksi.php";

if ($query) {
    echo "<script>
            alert('Data berhasil ditambahkan !');
            document.location='../modul4honda.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan !');
    document.location='../modul4honda.php';
    </script>";
}

mysqli_query($koneksi, $query);
?>