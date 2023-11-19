<?php


$path = $_FILES['photo']['name'];
$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
$photo = md5(time()) . $ext;
move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $photo);


$kode = $_POST['kode'];
$thn = $_POST['thn'];
$wrna = $_POST['wrna'];
$hrga = $_POST['hrga'];
$tipem = $_POST['tipem'];
$modelm = $_POST['modelm'];
$spesifikasi = $_POST['spesifikasi'];
$id_yamaha = $_POST['id_yamaha'];


$query = "INSERT INTO yamaha_motor (kode,id_yamaha, thn, wrna, hrga, tipem, modelm, spesifikasi, photo) 
        VALUES ('$kode','$id_yamaha','$thn','$wrna','$hrga','$tipem','$modelm','$spesifikasi','$photo')";

include "koneksi.php";

if ($query) {
    echo "<script>
            alert('Data berhasil ditambahkan !');
            document.location='../modul4yamaha.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan !');
    document.location='../modul4yamaha.php';
    </script>";
}

mysqli_query($koneksi, $query);
?>