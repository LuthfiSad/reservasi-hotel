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
    $nama = htmlspecialchars($_POST['nama']);
    $query = mysqli_query($koneksi, "UPDATE fasilitas_kamar set nama='$nama' where id_fas='$_GET[id]'");
    if ($query) {
        echo "<script>alert('Success Edit Data');location='../faskamar.php'</script>";
    } else {
        echo "<script>alert('Gagal Edit Data!');location='../faskamar.php'</script>";
    }
}
