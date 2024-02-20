<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi</title>
    <?php 
        require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php");
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid p-1 py-2 bg-body-secondary rounded-1" style="min-height: 90dvh; height: 100%;">
            <div class="container-fluid p-1 py-5 bg-secondary rounded-1" style="min-height: 90dvh; height: 100%;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title fs-4 text-light">Reservasi Jadwal</h3>
                        <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                            <div class="breadcrumb breadcrumb-item">
                                <li class="breadcrumb-item">
                                    <a href="../dashboard/index.php" class="text-light text-decoration-none">Beranda</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="../ui/header.php?page=reservasi&email=<?=$_SESSION['email_pengguna']?>"
                                        class="text-light text-decoration-none">Reservasi</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around align-items-start flex-wrap gap-3">
                    <?php 
                        if(isset($_GET["edit"])){
                            $id = htmlspecialchars($_GET['edit']);
                            $hasil = $model->Lihatreservasi($id);
                            foreach ($hasil as $row) {
                    ?>
                    <div class="card" style="min-width: 25%; width: 434px;">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-edit"></i>
                                Edit Reservasi
                                <img src="../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:180px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../ui/header.php?act=reservasi-edit" method="post">
                                <table class="table table-striped">
                                    <input type="hidden" name="id" value="<?=$row['id']?>" readonly>
                                    <tr>
                                        <td class="fs-5 fw-normal">Email</td>
                                        <td>
                                            <input type="email" name="email" class="form-control"
                                                value="<?=$_SESSION['email_pengguna']?>" required readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Plat Kendaraan</td>
                                        <td>
                                            <input type="text" name="plat_kendaraan" class="form-control"
                                                value="<?=$row['plat_kendaraan']?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Merk Kendaraan</td>
                                        <td>
                                            <select name="merk_kendaraan" class="form-control" required>
                                                <option value="">Pilih Merk Kendaraan roda 4</option>
                                                <?php 
                                                    $hasil = $lihat -> Merk();
                                                    foreach ($hasil as $isi) {
                                                ?>
                                                <option <?php if($row["merk_kendaraan"] == $isi["merk_kendaraan"]){?>
                                                    value="<?=$isi['merk_kendaraan']?>" selected <?php } ?>>
                                                    <?=$isi['id']?> - <?=$isi['merk_kendaraan']?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Tanggal Reservasi</td>
                                        <td>
                                            <input type="date" name="tanggal_input" class="form-control"
                                                value="<?=$row['tanggal_input']?>" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Jam Reservasi</td>
                                        <td>
                                            <input type="time" name="waktu_input" class="form-control"
                                                value="<?=$row['waktu_input']?>" required>
                                        </td>
                                    </tr>
                                </table>
                                <div class="card-footer">
                                    <p class="text-md-end text-lg-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i>
                                            <span>Simpan</span>
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                            }
                    ?>
                    <?php
                        }else{
                    ?>
                    <div class="card" style="min-width: 25%; width: 434px;">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-plus"></i>
                                Tambah Reservasi
                                <img src="../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:180px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../ui/header.php?act=reservasi-tambah" method="post">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="fs-5 fw-normal">Email</td>
                                        <td>
                                            <input type="email" name="email" class="form-control"
                                                value="<?=$_SESSION['email_pengguna']?>" required readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Plat Kendaraan</td>
                                        <td>
                                            <input type="text" name="plat_kendaraan" class="form-control" value=""
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Merk Kendaraan</td>
                                        <td>
                                            <select name="merk_kendaraan" class="form-control" required>
                                                <option value="">Pilih Merk Kendaraan roda 4</option>
                                                <?php 
                                                    $hasil = $lihat -> Merk();
                                                    foreach ($hasil as $isi) {
                                                ?>
                                                <option value="<?=$isi['merk_kendaraan']?>"><?=$isi['id']?> -
                                                    <?=$isi['merk_kendaraan']?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Tanggal Reservasi</td>
                                        <td>
                                            <input type="date" name="tanggal_input" class="form-control" value=""
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5 fw-normal">Jam Reservasi</td>
                                        <td>
                                            <input type="time" name="waktu_input" class="form-control" value=""
                                                required>
                                        </td>
                                    </tr>
                                </table>
                                <div class="card-footer">
                                    <p class="text-md-end text-lg-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i>
                                            <span>Simpan</span>
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            <i class="fa fa-eraser"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="card" style="min-width: 67.5%; width: 728px;">
                        <div class="card-header">
                            <div class="card-header-form">
                                <p class="text-start">
                                    <a href="../ui/header.php?page=reservasi&email=<?=$_SESSION['email_pengguna']?>"
                                        class="btn btn-warning">
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
                                            <th class="fs-6 fw-normal">Email</th>
                                            <th class="fs-6 fw-normal">Plat Kendaraan</th>
                                            <th class="fs-6 fw-normal">Merk Kendaraan</th>
                                            <th class="fs-6 fw-normal">Jadwal Reservasi</th>
                                            <th class="fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $email = $_SESSION['email_pengguna'];
                                            $no = 1;
                                            $hasil = $model->reservasi($email);
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $isi['plat_kendaraan']; ?></td>
                                            <td><?php echo $isi['merk_kendaraan']; ?></td>
                                            <td><?php echo $isi['tanggal_input']." : ".$isi['waktu_input']; ?></td>
                                            <td>
                                                <a href="../laporan/print.php?email=<?=$email;?>&print=<?=$isi['id'];?>"
                                                    class="btn btn-secondary" target="_blank">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                                <a href="../ui/header.php?page=reservasi&email=<?=$email?>&edit=<?=$isi['id']?>"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-edit"></i>
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