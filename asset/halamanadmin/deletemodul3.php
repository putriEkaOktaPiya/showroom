<?php
// ambil nim dari url variable
$id_motor = $_REQUEST['id_motor'];
// koneksi
include "action/koneksi.php";
// ambil nama photo
$q = mysqli_query($koneksi, "SELECT photo_motor FROM model_motor WHERE id_motor='$id_motor'");
$dt = mysqli_fetch_array($q);
$photo_motor = $dt['photo_motor'];
// hapus file nya
unlink('image/' . $photo_motor);
// jalankan query delete dengan condition nim=nimnya
mysqli_query($koneksi, "DELETE FROM model_motor WHERE id_motor='$id_motor'");
// kembalikan ke halaman data.php
if ($q) {
    echo "<script>
            alert('Data berhasil dihapuskan !');
            document.location='modul3.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal dihapuskan !');
    document.location='modul3.php';
    </script>";
}
?>

