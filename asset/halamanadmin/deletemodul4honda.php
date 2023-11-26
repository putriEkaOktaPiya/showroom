<?php
// ambil nim dari url variable
$kode = $_REQUEST['kode'];
// koneksi
include "action/koneksi.php";
// ambil nama photo
$q = mysqli_query($koneksi, "SELECT photo FROM honda_motor WHERE kode='$kode'");
$dt = mysqli_fetch_array($q);
$photo = $dt['photo'];
// hapus file nya
unlink('image/' . $photo_motor);
// jalankan query delete dengan condition nim=nimnya
mysqli_query($koneksi, "DELETE FROM honda_motor WHERE kode='$kode'");
// kembalikan ke halaman data.php
if ($q) {
    echo "<script>
            alert('Data berhasil dihapuskan !');
            document.location='modul4honda.php';
          </script>";
} else {
    echo "<script>
    alert('Data gagal dihapuskan !');
    document.location='modul4honda.php';
    </script>";
}
?>

