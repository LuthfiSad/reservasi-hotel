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
    $same = mysqli_query($koneksi, "SELECT * from detail where id_kamar='$_POST[id_kamar]' and id_fas='$_POST[nama]'");
    $cek = mysqli_num_rows($same);
    if ($cek >= 1) {
        echo "<script>alert('Anda Memiliki Data Yang Sama');location='../faskamar.php'</script>";
    } else {
        $query = mysqli_query($koneksi, "INSERT into detail value ('', '$_POST[id_kamar]', '$_POST[nama]')");
        if ($query) {
            echo "<script>alert('Success Tambah Data');location='../faskamar.php'</script>";
        } else {
            echo "<script>alert('Gagal Tambah Data!');location='../faskamar.php'</script>";
        }
    }
}
