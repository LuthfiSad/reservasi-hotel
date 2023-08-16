<?php
include "../model/koneksi.php";
include "../layout/header.php";
$fasilitas = mysqli_query($koneksi, "SELECT * from fasilitas_hotel");
?>
<style>
    img {
        height: 244px;
        width: 100%;
    }

    .col-md-5 {
        padding-left: 0;
        padding-right: 0;
    }
</style>

<body>
    <?php
    include "../layout/navbar.php";
    ?>
    <div class="container py-5 text-light">
        <h1 class="text-center text-dark">Macam - Macam Fasilitas</h1>
        <div class="row justify-content-center">
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($fasilitas)) {
                if ($no % 2 == 1) {
            ?>
                    <div class="col-10">
                        <div class="row py-3" dir="rtl">
                            <div class="col-md-5">
                                <img src="../img/<?= $data['foto']  ?>" alt="">
                            </div>
                            <div class="col-md-6 card bg-dark">
                                <h4 class="my-auto"><?= $data['nama'] ?></h4>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-10">
                        <div class="row py-3">
                            <div class="col-md-5">
                                <img src="../img/<?= $data['foto']  ?>" alt="">
                            </div>
                            <div class="col-md-6 card bg-dark">
                                <h4 class="my-auto"><?= $data['nama'] ?></h4>
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