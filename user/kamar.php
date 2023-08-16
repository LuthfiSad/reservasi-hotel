<?php
include "../model/koneksi.php";
include "../layout/header.php";
$kamar = mysqli_query($koneksi, "SELECT * from kamar");
?>
<style>
    img {
        height: 100%;
        width: 100%;
    }

    p,
    .card ul {
        margin-bottom: 0;
    }

    small,
    .card li {
        font-size: 10px;
    }

    @media (max-width:767px) {
        .col-md {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>

<body class="bg-secondary">
    <?php
    include "../layout/navbar.php";
    ?>
    <div class="container py-5">
        <h1 class="text-center text-light">Macam - Macam Kamar</h1>
        <div class="row justify-content-center">
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($kamar)) {
                if ($no % 2 == 1) {
            ?>
                    <div class="col-10">
                        <div class="row py-3" dir="rtl">
                            <div class="col-md">
                                <img src="../img/<?= $data['foto']  ?>" alt="">
                            </div>
                            <div class="col-md-7 card" dir="ltr">
                                <small class="text-danger">Stok : <?= $data['jumlah'] ?></small>
                                <h4><?= $data['tipe'] ?> <small class="text-info">Harga : Rp. <?= $data['harga'] ?>/ Hari</small></h4>
                                <p>Fasilitas : </p>
                                <ul>
                                    <?php
                                    $fasilitas = mysqli_query($koneksi, "SELECT * from detail, fasilitas_kamar where detail.id_kamar='$data[id_kamar]' and detail.id_fas=fasilitas_kamar.id_fas");
                                    while ($data1 = mysqli_fetch_assoc($fasilitas)) {

                                        echo "<li>$data1[nama]</li>";
                                    }
                                    ?>
                                </ul>
                                <small class="text-warning">Ukuran : <?= $data['ukuran'] ?></small>
                                <a href="reservasi.php">
                                    <button class="btn btn-sm btn-warning position-absolute end-0 bottom-0 me-3 mb-3">Pesan</button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-9">
                        <div class="row py-3">
                            <div class="col-md">
                                <img src="../img/<?= $data['foto']  ?>" alt="">
                            </div>
                            <div class="col-md-7 card">
                                <small class="text-danger">Stok : <?= $data['jumlah'] ?></small>
                                <h4><?= $data['tipe'] ?> <small class="text-info">Harga : Rp. <?= $data['harga'] ?>/ Hari</small></h4>
                                <p>Fasilitas : </p>
                                <ul>
                                    <?php
                                    $fasilitas = mysqli_query($koneksi, "SELECT * from detail, fasilitas_kamar where detail.id_kamar='$data[id_kamar]' and detail.id_fas=fasilitas_kamar.id_fas");
                                    while ($data1 = mysqli_fetch_assoc($fasilitas)) {

                                        echo "<li>$data1[nama]</li>";
                                    }
                                    ?>
                                </ul>
                                <small class="text-warning">Ukuran : <?= $data['ukuran'] ?></small>
                                <a href="reservasi.php">
                                    <button class="btn btn-sm btn-warning position-absolute end-0 bottom-0 me-3 mb-3">Pesan</button>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php }
                $no++;
            } ?>
        </div>
    </div>

    <?php
    include "../layout/footer.php";
    ?>