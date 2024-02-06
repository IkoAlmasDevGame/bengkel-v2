<?php 
if($_SESSION["user_level"] == ""){
    header("location:../index.php");
    exit(0);
}
?>

<?php 
if($_SESSION["user_level"] == "admin"){
?>
<div class="col-md-12 col-lg-12">
    <div class="bg-secondary">
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <a href="../dashboard/index.php" class="navbar-brand text-white">
                    <img src="../../../../assets/icon/Logo SMB.png" alt="LOGO" width="32">
                    Sahabat Motor Bengkel
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupported"
                    aria-expanded="false" aria-controls="navbarSupported">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupported">
                    <ul class="mx-auto mb-lg-2 mb-2 navbar-nav">
                        <li class="nav-item mx-3">
                            <a href="../dashboard/index.php" class="btn btn-outline-light">
                                <span class="fas fa-tachometer-alt"></span>
                                <span class="fs-5">Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <div class="dropdown">
                                <a href="" role="button" class="btn btn-outline-light dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fas fa-briefcase"></span>
                                    <span class="fs-5">kumpulan data</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="../barang/index.php" class="dropdown-item nav-link">
                                            <span class="fas fa-cubes"></span>
                                            <span>Data Barang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../kategori/index.php" class="dropdown-item nav-link">
                                            <span class="fas fa-cube"></span>
                                            <span>Data Kategori</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-3">
                            <div class="dropdown">
                                <a href="" role="button" class="btn btn-outline-light dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fas fa-shopping-bag"></span>
                                    <span class="fs-5">Penjualan</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="" class="dropdown-item nav-link">
                                            <span class="fas fa-shopping-basket"></span>
                                            <span>Kasir Penjualan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-3">
                            <a href="" class="btn btn-outline-light">
                                <span class="fas fa-envelope"></span>
                                <span class="fs-5">Kontak Masuk</span>
                            </a>
                        </li>
                        <li class="nav-item mx-3">
                            <div class="dropdown">
                                <a href="" role="button" class="btn btn-outline-light dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fas fa-book"></span>
                                    <span class="fs-5">Laporan</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="" class="dropdown-item nav-link">
                                            <span class="fas fa-money-bill"></span>
                                            <span>Laporan Keuangan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item nav-link">
                                            <span class="fas fa-history"></span>
                                            <span>Reservasi Jadwal</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mx-3">
                            <div class="dropdown">
                                <a href="" role="button" class="btn btn-outline-light dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fa fa-gear"></span>
                                    <span class="fs-5">Settings</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="" class="dropdown-item nav-link">
                                            <span class="fas fa-user-alt"></span>
                                            <span>Edit Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="dropdown-item nav-link">
                                            <span class="fas fa-info"></span>
                                            <span>Edit Informasi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../ui/header.php?aksi=keluar"
                                            onclick="javascript:return confirm('Apakah anda ingin keluar dari website ini ?')"
                                            class="dropdown-item nav-link">
                                            <span class="fas fa-sign-out-alt"></span>
                                            <span>Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="ms-auto text-white fs-5">
                    <div class="dropdown">
                        <a href="" role="button" class="btn dropdown-toggle text-white" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo ucwords(ucfirst($_SESSION["email"])); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item bg-light text-black">
                                <?php echo "Nama : ".ucwords(ucfirst($_SESSION["nama"])) ?>
                            </li>
                            <li class="dropdown-item bg-light text-black">
                                <?php echo "Jabatan : ".ucwords(ucfirst($_SESSION["user_level"])) ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<?php
}else{
    header("location:../index.php");
    exit(0);
}
?>