<?php 
require_once("../ui/header.php");
require_once("../ui/navbar.php");
?>

<div class="col-md-12 col-lg-12">
    <div class="p-5 container-md container-lg bg-secondary rounded-2 mt-5 pt-5 pb-5 mb-5">
        <div class="text-start fw-normal text-white fs-4 mb-2 text-decoration-underline">
            Dashboard Laporan Pada Bengkel Sahabat Motor
        </div>
        <div class="py-5 p-3 container-fluid rounded-2 bg-light">
            <div class="text-end fw-normal text-black fs-4">
                <?php echo "Rp. ".number_format(0); ?>
            </div>
            <div class="border border-top mb-3"></div>
            <div class="d-flex justify-content-around align-items-center gap-3 flex-wrap">
                <div class="card col-md-2 col-lg-2">
                    <div class="card-body">
                        <div class="card-header text-center">
                            <h5 class="fa fa-cubes"></h5>
                            <span class="mx-2">Data Barang</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="card-header text-center bg-light">
                            <h5 class="fw-normal"><?php echo (float)0; ?></h5>
                        </div>
                        <div class="text-end">
                            <a href="#" role="button" class="btn fa fa-arrow-right"></a>
                            <!-- <a href="../menu/barang/" role="button" class="btn fa fa-arrow-right"></a> -->
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
                            <h5 class="fw-normal"><?php echo (float)0; ?></h5>
                        </div>
                        <div class="text-end">
                            <a href="#" role="button" class="btn fa fa-arrow-right"></a>
                            <!-- <a href="../menu/kategori/" role="button" class="btn fa fa-arrow-right"></a> -->
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
            </div>
        </div>
    </div>
</div>

<?php 
require_once("../ui/footer.php");
?>