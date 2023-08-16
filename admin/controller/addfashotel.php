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
    $ekstensi = array('jpg', 'jpeg', 'png', 'gif');
    $ex = explode('.', $_FILES['foto']['name']);
    $eks = strtolower(end($ex));
    $image = rand() . "_" . $_FILES['foto']['name'];
    if (in_array($eks, $ekstensi)) {
        if ($_FILES['foto']['size'] < 10000000) {
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../img/' . $image);
            $nama = htmlspecialchars($_POST['nama']);
            $query = mysqli_query($koneksi, "INSERT into fasilitas_hotel value ('', '$image', '$nama')");
            if ($query) {
                echo "<script>alert('Success Tambah Data');location='../fashotel.php'</script>";
            } else {
                echo "<script>alert('Gagal Tambah Data!');location='../fashotel.php'</script>";
            }
        } else {
            echo "<script>alert('Ukuran Foto Terlalu Besar');location='../fashotel.php'</script>";
        }
    } else {
        echo "<script>alert('Ekstensi Tidak Di Perbolehkan');location='../fashotel.php'</script>";
    }
}
