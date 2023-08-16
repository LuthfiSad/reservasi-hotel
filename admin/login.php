<?php
include "../model/koneksi.php";
include "../layout/header.php";
?>

<style>
    .shadow-box {
        box-shadow: 2px 2px 2px 2px gray;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 position-absolute start-50 top-50 translate-middle">
                <div class="card shadow-box">
                    <div class="card-body">
                        <a href="../user/"><button type="button" class="btn-sm bg-danger btn-close" aria-label="Close"></button></a>
                        <h1 class="text-center mb-3">Login</h1>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="user" name="user" placeholder="user" autocomplete="off">
                                <label for="user">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" required id="pass" name="pass" placeholder="pass">
                                <label for="pass">Password</label>
                            </div>
                            <div class="row">
                                <div class="col-md mb-2">
                                    <button name="submit" class="w-100 btn-sm btn btn-primary">Login</button>
                                </div>
                                <div class="col-md">
                                    <button type="reset" class="w-100 btn-sm btn btn-warning">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $pass = hash('sha1', md5($_POST['pass']));
        $query = mysqli_query($koneksi, "SELECT * from users where user='$_POST[user]' and pass='$pass'");
        $cek = mysqli_num_rows($query);
        if ($cek >= 1) {
            $data = mysqli_fetch_assoc($query);
            $_SESSION['level'] = $data['level'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['foto'] = $data['foto'];
            echo "<script>alert('Anda Berhasil Login');
            location='index.php'</script>";
        } else {
            echo "<script>alert('Anda Tidak Memiliki Akses');</script>";
        }
    } elseif (isset($_SESSION['level'])) {
        echo "<script>alert('Anda Sudah Login Sebagai " . $_SESSION['level'] . "');
        location='index.php'</script>";
    }
    include "../layout/footer.php";
    ?>