<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
    <?php 
        require_once("../ui/header.php");
    ?>
</head>

<body>
    <?php 
        require_once("../ui/navbar.php")
    ?>
    <div class="col-md-12 col-lg-12">
        <div class="container-fluid p-1 py-5 bg-info">
            <div class="container-fluid py-5 rounded-1 bg-light">
                <div class="d-flex justify-content-around align-items-start gap-1 flex-wrap">
                    <?php 
                        if(isset($_GET["id_barang"])){
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 24%; width:185px;">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-edit"></i>
                                Edit Barang
                                <img src="../../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:120px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../ui/header.php?act=edit-barang" method="post" enctype="multipart/form-data">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="fs-6">Nama</td>
                                        <td>
                                            <input type="hidden" name="" value="" class="form-control" required>
                                            <input type="text" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Kategori</td>
                                        <td>
                                            <select name="" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Merk</td>
                                        <td>
                                            <input type="text" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Beli</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Jual</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Stok</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Satuan</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Photo</td>
                                        <td>
                                            <input type="file" name="" id="" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Tanggal</td>
                                        <td>
                                            <input type="text" name="" id="" value="<?=date('d/m/Y');?>"
                                                class="form-control" required readonly>
                                        </td>
                                    </tr>
                                </table>
                                <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                                <button class="btn btn-danger" type="reset">
                                    <i class="fa fa-eraser"></i>
                                    <span>Hapus Semua</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                        }else if(isset($_GET["id"])){
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 24%; width:185px;">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-briefcase"></i>
                                Lihat Barang
                                <img src="../../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:120px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td class="fs-6">Nama</td>
                                    <td>
                                        <input type="text" name="" id="" class="form-control"
                                            placeholder="Masukkan Nama Barang" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Kategori</td>
                                    <td>
                                        <select name="" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Merk</td>
                                    <td>
                                        <input type="text" name="" id="" class="form-control"
                                            placeholder="Masukkan Merk Barang" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Beli</td>
                                    <td>
                                        <input type="number" name="" id="" class="form-control"
                                            placeholder="Masukkan Harga Beli" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Jual</td>
                                    <td>
                                        <input type="number" name="" id="" class="form-control"
                                            placeholder="Masukkan Harga Jual" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Stok</td>
                                    <td>
                                        <input type="number" name="" id="" class="form-control"
                                            placeholder="Masukkan Stok Barang" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Satuan</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="">Pilih Satuan Barang</option>
                                            <option value="Pcs">Pcs</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Photo</td>
                                    <td>
                                        <input type="file" name="" id="" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Tanggal</td>
                                    <td>
                                        <input type="text" name="" id="" value="<?=date('d/m/Y');?>"
                                            class="form-control" required readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 24%; width:185px;">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-plus"></i>
                                Tambah Barang
                                <img src="../../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:120px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="../ui/header.php?act=simpan-barang" method="post"
                                enctype="multipart/form-data">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="fs-6">Nama</td>
                                        <td>
                                            <input type="text" name="" id="" class="form-control"
                                                placeholder="Masukkan Nama Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Kategori</td>
                                        <td>
                                            <select name="" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Merk</td>
                                        <td>
                                            <input type="text" name="" id="" class="form-control"
                                                placeholder="Masukkan Merk Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Beli</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control"
                                                placeholder="Masukkan Harga Beli" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Jual</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control"
                                                placeholder="Masukkan Harga Jual" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Stok</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control"
                                                placeholder="Masukkan Stok Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Satuan</td>
                                        <td>
                                            <select name="satuan" class="form-control" required>
                                                <option value="">Pilih Satuan Barang</option>
                                                <option value="Pcs">Pcs</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Photo</td>
                                        <td>
                                            <input type="file" name="" id="" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Tanggal</td>
                                        <td>
                                            <input type="text" name="" id="" value="<?=date('d/m/Y');?>"
                                                class="form-control" required readonly>
                                        </td>
                                    </tr>
                                </table>
                                <button class="btn btn-primary" name="submit" type="submit">
                                    <i class="fa fa-save"></i>
                                    <span>Simpan</span>
                                </button>
                                <button class="btn btn-danger" type="reset">
                                    <i class="fa fa-eraser"></i>
                                    <span>Hapus Semua</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <div class="card" style="min-width: 73.52%; width:820px">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-briefcase"></i>
                                <span>Data Barang</span>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 fw-normal">No</th>
                                            <th class="fs-6 fw-normal">Nama Barang</th>
                                            <th class="fs-6 fw-normal">Kategori Barang</th>
                                            <th class="fs-6 fw-normal">Merk Barang</th>
                                            <th class="fs-6 fw-normal">Harga Beli</th>
                                            <th class="fs-6 fw-normal">Harga Jual</th>
                                            <th class="fs-6 fw-normal">Stok Barang</th>
                                            <th class="fs-6 fw-normal">Satuan Barang</th>
                                            <th class="fs-6 fw-normal">Photo Barang</th>
                                            <th class="fs-6 fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stok = 0;
                                            $hb = 0;
                                            $hj = 0;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="4" class="bg-success text-white">Total Semua</th>
                                        <th class="text-center"><?php echo "Rp. ".number_format($hb).",-" ?></th>
                                        <th class="text-center"><?php echo "Rp. ".number_format($hj).",-" ?></th>
                                        <th class="text-center"><?php echo number_format($stok) ?></th>
                                        <th colspan="3" class="bg-secondary"></th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require_once("../ui/footer.php")
    ?>