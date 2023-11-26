<?php


$kode = $_POST['kode_brand'];
$brand = $_POST['brand'];
$id_brand = $_POST['id_brand'];

if (isset($_POST['submit'])) {
$path = $_FILES['photo']['name'];
$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
$photo = md5(time()) . $ext;
move_uploaded_file($_FILES['photo']['tmp_name'], '../image/' . $photo);


$query = "INSERT INTO brand_motor (id_brand,kode_brand,brand,photo) VALUES ('$id_brand','$kode','$brand','$photo')";

include "koneksi.php";

if ($query) {
    echo "<script>
            alert('Data berhasil ditambahkan !');
            document.location='../modul1.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal ditambahkan !');
    document.location='../modul1.php';
    </script>";
}
}
mysqli_query ($koneksi, $query);

?>
