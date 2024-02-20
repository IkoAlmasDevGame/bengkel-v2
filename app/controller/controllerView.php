<?php 
namespace controller;
use model\View;

class Controller {
    protected $sdb;
    public function __construct($db)
    {
        $this->sdb = new view($db);
    }

    /* Barang */
    public function Barang(){
        $hasil = $this->sdb->LihatFullBarang();
        return $hasil;
    }

    public function StokBarang(){
        $hasil = $this->sdb->SisaStok();
        return $hasil;
    }
    
    public function DetailBarang(){
        $id = htmlspecialchars($_GET["id"]);
        $hasil = $this->sdb->LihatBarang($id);
        return $hasil;
    }
    
    public function BarangEdit(){
        $id = htmlspecialchars($_GET["id_barang"]);
        $hasil = $this->sdb->EditBarang($id);
        return $hasil;
    }

    public function BarangRow(){
        $row = $this->sdb->rowBarang();
        $hasil = $row->fetch_array();
        return $hasil;
    }
    
    public function KeuanganRow(){
        $row = $this->sdb->rowKeungan();
        $hasil = $row->fetch_array();
        return $hasil;
    }

    public function RestokRow(){
        $row = $this->sdb->rowRestok();
        $hasil = $row->fetch_array();
        return $hasil;
    }

    public function BarangSimpan(){
        $id_kategori = htmlspecialchars($_POST["kategori"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $merk = htmlspecialchars($_POST["merk"]);
        $beli = htmlspecialchars($_POST["beli"]);
        $jual = htmlspecialchars($_POST["jual"]);
        $stok = htmlspecialchars($_POST["stok"]);
        $satuan = htmlspecialchars($_POST["satuan"]);
        // Photo atau Gambar
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
        $image = htmlspecialchars($_FILES["image"]["name"]);
        $x_foto = explode('.', $image);
        $ekstensi_foto = strtolower(end($x_foto));
        $ukuran_foto = $_FILES['image']['size'];
        $file_tmp_foto = $_FILES['image']['tmp_name'];    
        // Tanggal menggunakan date input
        $tanggal = htmlspecialchars($_POST["tanggal_input"]);
        
        if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_foto < 10440070){
                move_uploaded_file($file_tmp_foto, "../../../../assets/inventory/" . $image);
                $this->sdb->SimpanBarang($id_kategori,$nama,$merk,$beli,$jual,$stok,$satuan,$image,$tanggal);
            }else{
                echo "GAGAL MENGUPLOAD FILE FOTO";
            }
        }else{
            echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
        }
    }

    public function BarangEditan(){
        $id = htmlspecialchars($_POST["id_barang"]);
        $id_kategori = htmlspecialchars($_POST["kategori"]);
        $nama = htmlspecialchars($_POST["nama"]);
        $merk = htmlspecialchars($_POST["merk"]);
        $beli = htmlspecialchars($_POST["beli"]);
        $jual = htmlspecialchars($_POST["jual"]);
        $stok = htmlspecialchars($_POST["stok"]);
        $stok_sisa = htmlspecialchars($_POST["sisa"]);
        $satuan = htmlspecialchars($_POST["satuan"]);
        // Photo atau Gambar
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif');
        $image = htmlspecialchars($_FILES["image"]["name"]);
        $x_foto = explode('.', $image);
        $ekstensi_foto = strtolower(end($x_foto));
        $ukuran_foto = $_FILES['image']['size'];
        $file_tmp_foto = $_FILES['image']['tmp_name'];    
        // Tanggal menggunakan date input
        $tanggal = htmlspecialchars($_POST["tanggal_input"]);
        
        if(in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_foto < 10440070){
                move_uploaded_file($file_tmp_foto, "../../../../assets/inventory/" . $image);
                $this->sdb->EditanBarang($id_kategori,$nama,$merk,$beli,$jual,$stok,$stok_sisa,$satuan,$image,$tanggal,$id);
            }else{
                echo "GAGAL MENGUPLOAD FILE FOTO";
            }
        }else{
            echo "EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN";
        }
    }

    public function BarangHapus(){
        $id = htmlspecialchars($_POST["id_barang"]);
        $this->sdb->HapusBarang($id);
    }

    public function restok(){
        $id = htmlspecialchars($_POST["id_barang"]);
        $stok = htmlspecialchars($_POST["stok"]);
        $stok_sisa = htmlspecialchars($_POST["sisa"]);
        $this->sdb->RestokBarang($stok,$stok_sisa,$id);
    }

    /* Kategori */
    public function Kategori(){
        $hasil = $this->sdb->LihatFullKategori();
        return $hasil;
    }

    public function KategoriSimpan(){
        $kategori = htmlspecialchars($_POST["kategori"]);
        $this->sdb->SimpanKategori($kategori);
    }

    public function KategoriEdit(){
        $id_kategori = htmlspecialchars($_GET["id_kategori"]);
        $hasil = $this->sdb->LihatKategori($id_kategori);
        return $hasil;
    }

    public function KategoriEditan(){
        $id_kategori = htmlspecialchars($_POST["id"]);
        $kategori = htmlspecialchars($_POST["kategori"]);
        $this->sdb->EditanKategori($kategori,$id_kategori);
    }

    public function KategoriHapus(){
        $id = htmlspecialchars($_POST["id_kategori"]);
        $this->sdb->HapusKategori($id);
    }

    public function KategoriRow(){
        $row = $this->sdb->rowKategori();
        $hasil = $row->fetch_array();
        return $hasil;
    }

    /*Kendaraan*/ 
    public function Merk(){
        $hasil = $this->sdb->merkKendaraan();
        return $hasil;
    }

}

?>