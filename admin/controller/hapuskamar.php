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
    $query = mysqli_query($koneksi, "DELETE from kamar where id_kamar = '$_GET[id]'");
    if ($query) {
        echo "<script>alert('Success Hapus Data');location='../kamar.php'</script>";
    } else {
        echo "<script>alert('Gagal Hapus Data!');location='../kamar.php'</script>";
    }
}
