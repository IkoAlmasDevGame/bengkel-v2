<?php 
require_once("../../../database/koneksi.php");

if (!empty($_GET['cari_barang'])) {
    if(isset($_POST['keyword'])){
        $cari = strip_tags(trim($_POST['keyword']));
        if($cari == ''){   

        }else{
            $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori from db_barang 
            inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori where 
            nama_kategori like '%$cari%' or nama_barang like '%$cari%' or merk_barang like '%$cari%'";
            $hasil = $conn -> query($sql);
        }
?>
<div class="overflow-y-scroll flex-shrink-0 g-0 gap-0">
    <table class="table table-striped table-bordered" id="example1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Harga Jual</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($hasil as $isi) {
            ?>
            <tr>
                <td><?php echo $isi["nama_barang"] ?></td>
                <td><?php echo "Rp. ".number_format($isi['harga_jual']).",-" ?></td>
                <td><?php echo $isi["nama_kategori"] ?></td>
                <td>
                    <a href="../ui/header.php?act=tambah-keranjang&id=<?=$isi['id_barang']?>"
                        class="btn btn-success btn-outline-light">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
    }
}
?>