<?php
include "koneksi.php";
mysqli_query($koneksi, "DELETE from crud where no_ujian='$_GET[id]'");
header('location:index.php');
