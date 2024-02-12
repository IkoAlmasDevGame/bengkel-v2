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
        <div class="container-fluid p-1 py-1 bg-info">
            <div class="container-fluid p-1 py-1 rounded-1 bg-light">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="fs-5 fw-normal panel-title">
                            <i class="fa fa-briefcase"></i>
                            <span>Data Barang</span>
                        </div>
                        <div class="breadcumb">
                            <div class="d-flex justify-content-end align-items-end flex-wrap">
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../dashboard/index.php"
                                        class="text-decoration-none text-primary">Beranda</a>
                                </li>
                                <li class="breadcrumb breadcrumb-item">
                                    <a href="../ui/header.php?page=barang"
                                        class="text-decoration-none text-primary">Barang</a>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-start align-items-start gap-4 flex-wrap">
                    <?php 
                        if(isset($_GET["id_barang"])){
                            $id = htmlspecialchars($_GET["id_barang"]);
                            $hasil = $lihat -> BarangEdit($id);
                            foreach ($hasil as $isi) {
                    ?>
                    <div class="card col-sm-3 col-md-3 justify-content-start align-items-start"
                        style="min-width: 25%; width:320px;">
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
                                            <input type="hidden" name="id_barang" value="<?=$isi["id_barang"]?>"
                                                class="form-control" required>
                                            <input type="text" name="nama" value="<?=$isi["nama_barang"]?>" id=""
                                                class="form-control" placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Kategori</td>
                                        <td>
                                            <select name="kategori" id="id_kategori" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php 
                                                    $hasil = $lihat->Kategori();
                                                    foreach ($hasil as $row) {
                                                ?>
                                                <option <?php if($row["id_kategori"] == $isi["id_kategori"]){?> selected
                                                    value="<?=$isi["id_kategori"]?>" <?php } ?>>
                                                    <?php echo $row["nama_kategori"] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Merk</td>
                                        <td>
                                            <input type="text" name="merk" value="<?=$isi["merk_barang"]?>" id=""
                                                class="form-control" placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Beli</td>
                                        <td>
                                            <input type="number" name="beli" value="<?=$isi["harga_beli"]?>" id=""
                                                class="form-control" placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Jual</td>
                                        <td>
                                            <input type="number" name="jual" value="<?=$isi["harga_jual"]?>" id=""
                                                class="form-control" placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Stok</td>
                                        <td>
                                            <input type="number" name="stok" value="<?=$isi["stok"]?>" id=""
                                                class="form-control" placeholder="" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Sisa</td>
                                        <td>
                                            <input type="number" name="sisa" value="<?=$isi["stok_sisa"]?>" id=""
                                                class="form-control" placeholder="" required readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Satuan</td>
                                        <td>
                                            <select name="satuan" class="form-control" required>
                                                <option value="">Pilih Satuan Barang</option>
                                                <option <?php if($isi["satuan_barang"] == "per-orangan"){?> selected
                                                    <?php } ?>>Orang</option>
                                                <option <?php if($isi["satuan_barang"] == "Pcs"){?> selected value="Pcs"
                                                    <?php } ?>>Pcs</option>
                                                <option <?php if($isi["satuan_barang"] == "Kardus"){?> selected
                                                    value="Kardus" <?php } ?>>Kardus</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Photo</td>
                                        <td>
                                            <input type="file" name="image" value="<?=$isi["image"]?>" id=""
                                                class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Tanggal</td>
                                        <td>
                                            <input type="text" name="tanggal_input" id="" value="<?=date('d/m/Y');?>"
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
                    <?php
                        }else if(isset($_GET["id"])){
                            $id = htmlspecialchars($_GET["id"]);
                            $hasil = $lihat -> DetailBarang($id);
                        foreach ($hasil as $isi) {
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 25%; width:320px;">
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
                                <input type="hidden" name="id_barang" value="<?=$isi["id_barang"]?>" id=""
                                    class="form-control" placeholder="Masukkan Nama Barang" required readonly>
                                <tr>
                                    <td class="fs-6">Nama</td>
                                    <td>
                                        <input type="text" name="nama" value="<?=$isi["nama_barang"]?>" id=""
                                            class="form-control" placeholder="Masukkan Nama Barang" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Kategori</td>
                                    <td>
                                        <select name="" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php 
                                                $hasil = $lihat->Kategori();
                                                foreach ($hasil as $row) {
                                            ?>
                                            <option <?php if($row["id_kategori"] == $isi["id_kategori"]){?> selected
                                                <?php } ?>><?php echo $row["nama_kategori"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Merk</td>
                                    <td>
                                        <input type="text" name="merk" value="<?=$isi["merk_barang"]?>" id=""
                                            class="form-control" placeholder="Masukkan Merk Barang" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Beli</td>
                                    <td>
                                        <input type="number" name="beli" value="<?=$isi["harga_beli"]?>" id=""
                                            class="form-control" placeholder="Masukkan Harga Beli" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Jual</td>
                                    <td>
                                        <input type="number" name="jual" value="<?=$isi["harga_jual"]?>" id=""
                                            class="form-control" placeholder="Masukkan Harga Jual" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Stok</td>
                                    <td>
                                        <input type="number" name="stok" value="<?=$isi["stok"]?>" id=""
                                            class="form-control" placeholder="Masukkan Stok Barang" required readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Sisa</td>
                                    <td>
                                        <input type="number" name="sisa" value="<?=$isi["stok_sisa"]?>" id=""
                                            class="form-control" placeholder="Masukkan Sisa Stok Barang" required
                                            readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Satuan</td>
                                    <td>
                                        <select name="satuan" class="form-control" required>
                                            <option value="">Pilih Satuan Barang</option>
                                            <option <?php if($isi["satuan_barang"] == "per-orangan"){?> selected
                                                <?php } ?>>
                                                Orang</option>
                                            <option <?php if($isi["satuan_barang"] == "Pcs"){?> selected <?php } ?>>
                                                Pcs</option>
                                            <option <?php if($isi["satuan_barang"] == "Kardus"){?> selected <?php } ?>>
                                                Kardus</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Photo</td>
                                    <td>
                                        <img src="../../../../assets/inventory/<?=$isi["image"]?>" width="32"
                                            class="img-rounded" alt="<?=$isi["image"]?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Tanggal</td>
                                    <td>
                                        <input type="text" name="tanggal_input" id="" value="<?=$isi["tanggal_input"]?>"
                                            class="form-control" required readonly>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <?php
                        }else{
                    ?>
                    <div class="card col-sm-3 col-md-3" style="min-width: 25%; width:320px;">
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
                                            <input type="text" name="nama" id="" class="form-control"
                                                placeholder="Masukkan Nama Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Kategori</td>
                                        <td>
                                            <select name="kategori" id="id_kategori" class="form-control" required>
                                                <option value="">Pilih Kategori</option>
                                                <?php 
                                                    $hasil = $lihat->Kategori();
                                                    foreach ($hasil as $row) {
                                                ?>
                                                <option value="<?=$row["id_kategori"]?>">
                                                    <?php echo $row["nama_kategori"] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Merk</td>
                                        <td>
                                            <input type="text" name="merk" id="" class="form-control"
                                                placeholder="Masukkan Merk Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Beli</td>
                                        <td>
                                            <input type="number" name="beli" id="" class="form-control"
                                                placeholder="Masukkan Harga Beli" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Jual</td>
                                        <td>
                                            <input type="number" name="jual" id="" class="form-control"
                                                placeholder="Masukkan Harga Jual" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Stok</td>
                                        <td>
                                            <input type="number" name="stok" id="" class="form-control"
                                                placeholder="Masukkan Stok Barang" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Satuan</td>
                                        <td>
                                            <select name="satuan" class="form-control" required>
                                                <option value="">Pilih Satuan Barang</option>
                                                <option value="per-orangan">orang</option>
                                                <option value="Pcs">Pcs</option>
                                                <option value="Kardus">Kardus</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Photo</td>
                                        <td>
                                            <input type="file" name="image" id="" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fs-6">Tanggal</td>
                                        <td>
                                            <input type="text" name="tanggal_input" id="" value="<?=date('d/m/Y');?>"
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
                            <div class="card-header-form">
                                <h4 class="card-title">
                                    <i class="fa fa-briefcase"></i>
                                    <span>Data Barang</span>
                                </h4>
                                <a href="../ui/header.php?page=barang&stok=yes" class="btn btn-primary">
                                    <i class="fa fa-list-alt"></i>
                                    <span>Stok Barang</span>
                                </a>
                                <a href="../ui/header.php?page=barang" class="btn btn-warning">
                                    <i class="fa fa-refresh"></i>
                                    <span>Refresh</span>
                                </a>
                                <a href="../ui/header.php?page=barang&restok=yes" class="btn btn-danger">
                                    <i class="fa fa-cubes"></i>
                                    <span>Lihat Restok</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-md table-responsive-lg">
                                <?php 
                                    if(!empty($_GET["restok"]=="yes")){
                                ?>
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Stok Awal</th>
                                            <th>Restok</th>
                                            <th>Stok Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT db_persediaan.*, db_barang.id_barang, db_barang.nama_barang, db_kategori.id_kategori, db_kategori.nama_kategori FROM db_persediaan inner join db_barang on db_persediaan.id_barang = db_barang.id_barang inner join db_kategori on db_persediaan.id_kategori = db_kategori.id_kategori ORDER BY id DESC";
                                            $hasil = $conn->query($sql);
                                            $no = 1;
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $isi["nama_barang"]; ?></td>
                                            <td><?php echo $isi["nama_kategori"]; ?></td>
                                            <td><?php echo $isi["stok"]; ?></td>
                                            <td><?php echo $isi["restok"]; ?></td>
                                            <td><?php echo $isi["sisa"]; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                                    }else{
                                ?>
                                <table class="table table-striped" id="example1">
                                    <thead>
                                        <tr>
                                            <th class="fs-6 text-start fw-normal" style="min-width: 2%; width:8px;">No
                                            </th>
                                            <th class="fs-6 text-center fw-normal"
                                                style="min-width: 5.25%; width:100px;">Nama Barang</th>
                                            <th class="fs-6 text-center fw-normal">Kategori</th>
                                            <th class="fs-6 text-center fw-normal">Merk Barang</th>
                                            <th class="fs-6 text-center fw-normal">Harga Beli</th>
                                            <th class="fs-6 text-center fw-normal">Harga Jual</th>
                                            <th class="fs-6 text-center fw-normal">Stok</th>
                                            <th class="fs-6 text-center fw-normal">Sisa</th>
                                            <th class="fs-6 text-center fw-normal">Satuan</th>
                                            <th class="fs-6 text-center fw-normal">Photo</th>
                                            <th class="fs-6 text-center fw-normal">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $stok = 0;
                                            $hb = 0;
                                            $hj = 0;
                                            $no = 1;

                                            if(!empty($_GET["stok"]=="yes")){
                                                $hasil = $lihat->StokBarang();
                                            }else{
                                                $hasil = $lihat->Barang();
                                            }
                                            foreach ($hasil as $isi) {
                                        ?>
                                        <tr>
                                            <td class="text-start fw-normal"><?php echo $no; ?></td>
                                            <td class="text-center fw-normal"><?php echo $isi["nama_barang"]; ?>
                                            </td>
                                            <td class="text-center fw-normal">
                                                <?php echo $isi["nama_kategori"]; ?></td>
                                            <td class="text-center fw-normal"><?php echo $isi["merk_barang"]; ?>
                                            </td>
                                            <td class="text-center fw-normal">
                                                <?php echo number_format($isi["harga_beli"]); ?></td>
                                            <td class="text-center fw-normal">
                                                <?php echo number_format($isi["harga_jual"]); ?></td>
                                            <td class="text-center fw-normal"><?php echo $isi["stok"]; ?></td>
                                            <?php 
                                                if($isi["stok_sisa"] <= '3'){
                                            ?>
                                            <td>
                                                <form action="../ui/header.php?act=restok-barang"
                                                    enctype="multipart/form-data" method="post">
                                                    <input type="hidden" name="id_barang"
                                                        value="<?php echo $isi['id_barang'];?>" class="form-control">
                                                    <input type="number" name="sisa" class="form-control" required>
                                                    <button class="btn btn-secondary" type="submit">
                                                        <i class="fa fa-save"></i>
                                                    </button>
                                                    <a href="../ui/header.php?act=hapus-barang&id_barang=<?=$isi["id_barang"]?>"
                                                        class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </form>
                                                <?php
                                                }elseif($isi["stok_sisa"] == '0'){
                                            ?>
                                                <button class="btn btn-danger">Habis</button>
                                                <?php
                                                }else{
                                            ?>
                                            <td class="text-center fw-normal"><?php echo $isi["stok_sisa"]; ?>
                                            </td>
                                            <?php
                                                }
                                            ?>
                                            <td class="text-center fw-normal">
                                                <?php echo $isi["satuan_barang"]; ?></td>
                                            <td class="text-md-center fs-6 fw-normal">
                                                <img src="../../../../assets/inventory/<?=$isi["image"]?>"
                                                    alt="<?=$isi["image"]?>" width="32" class="img-rounded">
                                            </td>
                                            <td class="text-center fw-normal">
                                                <div class="dropdown">
                                                    <a href="" role="button" class="dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li class="dropdown-list">
                                                            <a href="../ui/header.php?page=barang&id=<?=$isi['id_barang']?>"
                                                                class="dropdown-item">
                                                                <i class="fa fa-eye"></i>
                                                                <span>Lihat Barang</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-list">
                                                            <a href="../ui/header.php?page=barang&id_barang=<?=$isi['id_barang']?>"
                                                                class="dropdown-item"
                                                                onclick="javascript:return confirm('Apakah anda ingin melihat data ini ?');">
                                                                <i class="fa fa-edit"></i>
                                                                <span>Edit Barang</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-list">
                                                            <a href="../ui/header.php?act=hapus-barang&id_barang=<?=$isi["id_barang"]?>"
                                                                class="dropdown-item"
                                                                onclick="javascript:return confirm('Apakah anda ingin menghapus data ini ?');">
                                                                <i class="fa fa-trash"></i>
                                                                <span>Hapus Barang</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                        $hb += $isi["stok"] * $isi["harga_beli"];
                                        $hj += $isi["stok"] * $isi["harga_jual"];
                                        $stok += $isi["stok"];
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th colspan="4" class="bg-success text-white">Total Semua</th>
                                        <th class="text-center"><?php echo "Rp. ".number_format($hb).",-" ?></th>
                                        <th class="text-center"><?php echo "Rp. ".number_format($hj).",-" ?></th>
                                        <th class="text-center"><?php echo number_format($stok) ?></th>
                                        <th colspan="4" class="bg-secondary"></th>
                                    </tfoot>
                                </table>
                                <?php 
                                    }
                                ?>
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