<!--MODUL 2 -->
<?php
$path = $_FILES['photo_motor']['name'];
$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
$photo_motor = md5(time()) . $ext;
move_uploaded_file($_FILES['photo_motor']['tmp_name'], '../image/' . $photo_motor);

$kode_motor = $_POST['kode_motor'];
$tipe_motor = $_POST['tipe_motor'];
$brand_motor = $_POST['brand_motor'];
$id_motor = $_POST['id_motor'];

$query = "INSERT INTO tipe_motor (id_motor,kode_motor,tipe_motor,brand_motor,photo_motor) VALUES ('$id_motor','$kode_motor','$tipe_motor','$brand_motor','$photo_motor')";

include "koneksi.php";

if ($query) {
    echo "<script>
            alert('Data berhasil ditambahkan !');
            document.location='../modul2.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan !');
    document.location='../modul2.php';
    </script>";
}

mysqli_query($koneksi, $query);

?>