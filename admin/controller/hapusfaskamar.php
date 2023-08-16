<?php
session_start();
include "../../model/koneksi.php";
if (empty($_SESSION['level'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');
    location='../login.php'</script>";
} elseif ($_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Administrasi');
    location='../index.php'</script>";
} else {
    mysqli_query($koneksi, "DELETE from detail where id_fas='$_GET[id]'");
    $query = mysqli_query($koneksi, "DELETE from fasilitas_kamar where id_fas = '$_GET[id]'");
    if ($query) {
        echo "<script>alert('Success Hapus Data');location='../faskamar.php'</script>";
    } else {
        echo "<script>alert('Gagal Hapus Data!');location='../faskamar.php'</script>";
    }
}
