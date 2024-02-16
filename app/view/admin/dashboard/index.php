<?php 
require_once("../ui/header.php");
require_once("../ui/navbar.php");
?>

<div class="col-md-12 col-lg-12">
    <div class="p-5 container-md container-lg bg-secondary rounded-2 mt-5 pt-5 pb-5 mb-5">
        <div class="text-start fw-normal text-white fs-4 mb-2 text-decoration-underline">
            Dashboard Laporan Pada Bengkel Sahabat Motor
            <?php 
            $sql = "select * from db_barang where restok <= 3";
            $row = $conn->query($sql);
            $r = mysqli_num_rows($row);
            if($r > 0){
                echo "
                <div class='alert alert-warning fs-5'>
                    <span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span>
                     barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !! <span class='pull-right'>
                     <a href='../ui/header.php?page=barang&stok=yes'>Cek Barang <i class='fa fa-angle-double-right'></i></a></span>
                </div>
                ";
            }
            ?>
        </div>
        <div class="py-5 p-3 container-fluid rounded-2 bg-light">
            <div class="text-end fw-normal text-black fs-4 mb-3">
                <?php echo "Rp. ".number_format(0); ?>
            </div>
            <div class="border border-top mb-3"></div>
            <div class="d-flex justify-content-between align-items-center gap-3 flex-wrap">
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-cubes"></h5>
                            <span class="mx-2">Data Barang</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal">
                                <?php $hasil = $lihat->BarangRow(); echo $hasil["jml"]; ?></h5>
                        </div>
                        <div class="text-end">
                            <a href="../ui/header.php?page=barang" role="button" class="btn fa fa-arrow-right"></a>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-cube"></h5>
                            <span class="mx-2">Data Kategori</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal"><?php $hasil = $lihat->KategoriRow(); echo $hasil["jml"];; ?></h5>
                        </div>
                        <div class="text-end">
                            <a href="../ui/header.php?page=kategori" role="button" class="btn fa fa-arrow-right"></a>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-user-alt"></h5>
                            <span class="mx-2">Data Reservasi</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal"><?php echo (float)0; ?></h5>
                        </div>
                        <div class="text-end">
                            <a href="#" role="button" class="btn fa fa-arrow-right"></a>
                            <!-- <a href="../reservasi/" role="button" class="btn fa fa-arrow-right"></a> -->
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-money-bill-alt"></h5>
                            <h6 class="text-center">Pengeluaran Keuangan</h6>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal">
                                <?php $hasil = $lihat->KeuanganRow(); echo "Rp. ".number_format($hasil["jual"]).",-"; ?>
                            </h5>
                        </div>
                        <div class="text-end">
                            <a href="#" role="button" class="btn fa fa-arrow-right"></a>
                        </div>
                    </div>
                </div>
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-cubes"></h5>
                            <h6 class="text-center">Pengambilan Restok</h6>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal">
                                <?php $hasil = $lihat->RestokRow(); echo $hasil["jml"]; ?>
                            </h5>
                        </div>
                        <div class="text-end">
                            <a href="#" role="button" class="btn fa fa-arrow-right"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once("../ui/footer.php");
?>