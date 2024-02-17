<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Jadwal</title>
    <?php 
        require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid p-1 py-1 bg-secondary">
            <div class="container-fluid p-1 py-1 bg-light">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="fs-5 fw-normal panel-title">
                            <i class="fa fa-database"></i>
                            <span>Reservasi Laporan</span>
                        </div>
                        <div class="breadcumb">
                            <div class="d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/index.php"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../ui/header.php?page=reservasi"
                                        class="text-decoration-none text-primary">Reservasi Laporan</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start align-items-start gap-4 flex-wrap">
                    <?php 
                        if(!empty($_GET['edit'])){
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 18%; width:285px;">
                        <div class="card-header">
                            <div class="card-header-form">

                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <table class="table table-striped">

                                </table>
                            </form>
                        </div>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 18%; width:285px;">
                        <div class="card-header">
                            <div class="card-header-form">

                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <table class="table table-striped">

                                </table>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="card" style="min-width: 77.25%; width:928px;">
                        <div class="card-header">
                            <div class="card-header-form">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-normal">No</th>
                                            <th class="fs-6 fw-normal">Nama Konsumen</th>
                                            <th class="fs-6 fw-normal">Plat Kendaraan</th>
                                            <th class="fs-6 fw-normal">Merk Kendaraan</th>
                                            <th class="fs-6 fw-normal">Tanggal Reservasi</th>
                                            <th class="fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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