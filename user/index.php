<?php
include "../model/koneksi.php";
include "../layout/header.php";
$kamar = mysqli_query($koneksi, "SELECT * from kamar");
$fasilitas = mysqli_query($koneksi, "SELECT * from fasilitas_hotel");
?>
<style>
    .carousel-item img {
        height: 630px;
    }
</style>

<body>
    <?php
    include "../layout/navbar.php";
    ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/hotel (1).png" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="../img/hotel (2).jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="../img/hotel (3).png" class="d-block w-100">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <div class="bg-dark position-absolute start-50 top-50 translate-middle text-danger opacity-75 p-5 text-center">
            <h1>Hotel Murah</h1>
            <p>ini hotel murah</p>
        </div>
    </div>
    <div class="navbar bg-danger p-1">
        <div class="container">
            <div class="ms-auto">
                <a href="reservasi.php">
                    <button class="btn btn-sm btn-warning">Pesan Sekarang</button>
                </a>
            </div>
        </div>
    </div>
    <div class="bg-dark py-5 text-light" id="about">
        <div class="container">
            <h1 class="text-center">Tentang Kami</h1>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque culpa minima suscipit similique perferendis, fugiat blanditiis facere illo sint sequi, consequatur, corporis omnis quos voluptate voluptatem temporibus quod ratione magni?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto eligendi libero ipsa! Eligendi dolorem neque rem animi, quidem placeat nam enim, aut numquam, facilis similique aspernatur illum nulla quae obcaecati.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Non veniam deleniti fugiat ad neque sit est accusantium aliquid hic dolorem reiciendis eos, sapiente sint doloribus, explicabo eligendi illo? Adipisci, commodi?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ullam nemo amet, iure accusantium sit deleniti qui ut reiciendis voluptatibus voluptatum itaque delectus quaerat distinctio unde possimus tenetur illum dolorem!
            </p>
        </div>
    </div>
    <div class="bg-secondary py-5" id="detail">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-3 border-bottom border-dark">
                    <h1 class="text-center">Kamar</h1>
                </div>
            </div>
            <div class="row justify-content-center py-3">
                <?php
                while ($data = mysqli_fetch_assoc($kamar)) {
                ?>
                    <div class="col-md-3 mb-2">
                        <div class="card">
                            <img src="../img/<?= $data['foto']  ?>" height="171" alt="">
                            <div class="card-body">
                                <h5 class="text-center"><?= $data['tipe']  ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="bg-dark py-5 text-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4 border-bottom">
                    <h1 class="text-center">Fasilitas</h1>
                </div>
            </div>
            <div class="row justify-content-center py-3">
                <?php
                while ($data = mysqli_fetch_assoc($fasilitas)) {
                ?>
                    <div class="col-md-3 mb-2">
                        <div class="card bg-secondary">
                            <img src="../img/<?= $data['foto']  ?>" height="171" alt="">
                            <div class="card-body">
                                <h5 class="text-center"><?= $data['nama']  ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php
    include "../layout/footer.php";
    ?>