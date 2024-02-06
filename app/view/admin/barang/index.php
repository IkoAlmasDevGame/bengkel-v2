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
                <div class="d-flex justify-content-around align-items-start gap-2 flex-wrap">
                    <?php 
                        if(isset($_GET["id_barang"])){
                    ?>
                    <div class="card col-sm-3 col-md-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-edit"></i>
                                Edit Barang
                                <img src="../../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:120px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="fs-5">Nama Barang</td>
                                        <td>
                                            <input type="hidden" name="" value="" class="form-control" require>
                                            <input type="text" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Kategori Barang</td>
                                        <td>
                                            <select name="" class="form-control" require>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Merk Barang</td>
                                        <td>
                                            <input type="text" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Harga Beli</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Harga Jual</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Stok Barang</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Satuan Barang</td>
                                        <td>
                                            <input type="number" name="" value="" id="" class="form-control"
                                                placeholder="" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Photo Barang</td>
                                        <td>
                                            <input type="file" name="" id="" class="form-control" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Tanggal Input</td>
                                        <td>
                                            <input type="text" name="" id="" value="<?=date('d/m/Y');?>"
                                                class="form-control" require readonly>
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
                        }else{
                    ?>
                    <div class="card col-sm-3 col-md-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fa fa-plus"></i>
                                Tambah Barang
                                <img src="../../../../assets/icon/Logo SMB.png" alt=""
                                    style="position: relative; left:120px;" width="32">
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <table class="table table-striped">
                                    <tr>
                                        <td class="fs-5">Nama Barang</td>
                                        <td>
                                            <input type="text" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Kategori Barang</td>
                                        <td>
                                            <select name="" class="form-control" require>
                                                <option value="">Pilih Kategori</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Merk Barang</td>
                                        <td>
                                            <input type="text" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Harga Beli</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Harga Jual</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Stok Barang</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Satuan Barang</td>
                                        <td>
                                            <input type="number" name="" id="" class="form-control" placeholder=""
                                                require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Photo Barang</td>
                                        <td>
                                            <input type="file" name="" id="" class="form-control" require>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-5">Tanggal Input</td>
                                        <td>
                                            <input type="text" name="" id="" value="<?=date('d/m/Y');?>"
                                                class="form-control" require readonly>
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
                    <div class="card col-md-8 col-lg-8">
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
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori Barang</th>
                                            <th>Merk Barang</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok Barang</th>
                                            <th>Satuan Barang</th>
                                            <th>Photo Barang</th>
                                            <th>Aksi</th>
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
        require_once("../ui/footer.php")
    ?>