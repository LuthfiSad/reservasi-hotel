<?php
session_start();
include "../../model/koneksi.php";
if (empty($_SESSION['level'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');
    location='../login.php'</script>";
} elseif ($_SESSION['level'] !== 'Resep' && $_SESSION['level'] !== 'Admin') {
    echo "<script>alert('Halaman Ini hanya Untuk Resepsionis');
    location='../index.php'</script>";
} else {
    if ($_GET['sts'] == 1) {
        mysqli_query($koneksi, "UPDATE reservasi set status=2 where id='$_GET[id]'");
    } elseif ($_GET['sts'] == 2) {
        mysqli_query($koneksi, "UPDATE reservasi set status=3 where id='$_GET[id]'");
    } elseif ($_GET['sts'] == 3) {
        mysqli_query($koneksi, "UPDATE reservasi set status=4 where id='$_GET[id]'");
    } elseif ($_GET['sts'] == 4) {
        mysqli_query($koneksi, "DELETE from reservasi where id='$_GET[id]'");
        echo "<script>alert('Hapus Data Berhasil');
        location='../reservasi.php';
        </script>";
    }

    echo "<script>alert('Ubah Status Berhasil');
    location='../reservasi.php';
    </script>";
}
