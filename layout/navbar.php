<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-danger opacity-75">
    <div class="container">
        <a class="navbar-brand" href="./">Hotel Murah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./#detail">Detail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kamar.php">Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="fasilitas.php">Fasilitas</a>
                </li>
                <?php
                if (isset($_SESSION['level'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/index.php">Kembali</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<style>
    .nav {
        height: 56px;
    }
</style>
<div class="nav bg-danger">

</div>