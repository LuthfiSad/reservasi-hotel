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
    if ($_FILES['foto']['name'] == null) {
        $query = mysqli_query($koneksi, "UPDATE fasilitas_hotel set nama='$nama' where id='$_GET[id]'");
        if ($query) {
            echo "<script>alert('Success Edit Data');location='../fashotel.php'</script>";
        } else {
            echo "<script>alert('Gagal Edit Data!');location='../fashotel.php'</script>";
        }
    } else {
        $ekstensi = array('jpg', 'jpeg', 'png', 'gif');
        $ex = explode('.', $_FILES['foto']['name']);
        $eks = strtolower(end($ex));
        $image = rand() . "_" . $_FILES['foto']['name'];
        if (in_array($eks, $ekstensi)) {
            if ($_FILES['foto']['size'] < 10000000) {
                move_uploaded_file($_FILES['foto']['tmp_name'], '../../img/' . $image);
                $query = mysqli_query($koneksi, "UPDATE fasilitas_hotel set foto='$image', nama='$nama' where id='$_GET[id]'");
                if ($query) {
                    echo "<script>alert('Success Edit Data');location='../fashotel.php'</script>";
                } else {
                    echo "<script>alert('Gagal Edit Data!');location='../fashotel.php'</script>";
                }
            } else {
                echo "<script>alert('Ukuran Foto Terlalu Besar');location='../fashotel.php'</script>";
            }
        } else {
            echo "<script>alert('Ekstensi Tidak Di Perbolehkan');location='../fashotel.php'</script>";
        }
    }
}
