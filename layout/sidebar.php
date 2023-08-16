<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="text-decoration-none brand-link">
        <img src="../img/<?= $_SESSION['foto'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $_SESSION['nama'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header"><?= $_SESSION['level'] ?></li>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php
                if ($_SESSION['level'] == 'Admin') {
                ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="kamar.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kamar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="faskamar.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Fasilitas Kamar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="fashotel.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Fasilitas Hotel</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="reservasi.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Reservasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="record.php" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Record
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../user/index.php" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Web
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>