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
        <div class="container-fluid p-1 py-1 bg-secondary" style="min-height: 90dvh; height:100%;">
            <div class="container-fluid p-1 py-1 bg-light" style="min-height: 90dvh; height:100%;">
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
                <div class="d-flex justify-content-start align-items-start flex-wrap">
                    <div class="card" style="min-width: 99dvw; width:100%;">
                        <div class="card-header">
                            <div class="card-header-form">
                                <p class="text-start">
                                    <a href="../ui/header.php?page=reservasi" class="btn btn-warning">
                                        <i class="fa fa-refresh"></i>
                                        <span>refresh halaman</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-normal">No</th>
                                            <th class="fs-6 fw-normal">Email Konsumen</th>
                                            <th class="fs-6 fw-normal">Plat Kendaraan</th>
                                            <th class="fs-6 fw-normal">Merk Kendaraan</th>
                                            <th class="fs-6 fw-normal">Tanggal Reservasi</th>
                                            <th class="fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $table = "db_reservasi";
                                            $rowTable = "SELECT * FROM $table order by id ASC";
                                            $hasil = $conn->query($rowTable);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $isi['email']; ?></td>
                                            <td><?php echo $isi['plat_kendaraan']; ?></td>
                                            <td><?php echo $isi['merk_kendaraan']; ?></td>
                                            <td><?php echo $isi['tanggal_input']." : ".$isi['waktu_input']; ?></td>
                                            <td>
                                                <a href="" class="btn btn-dark btn-outline-light">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                                <a href="../laporan/print.php?email=<?=$isi['email']?>" target="_blank"
                                                    class="btn btn-light btn-outline-secondary">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                            }                                    
                                        ?>
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