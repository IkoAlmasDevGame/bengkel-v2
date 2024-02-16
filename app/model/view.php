<?php 
namespace model;

class View {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    /* Barang */
    public function LihatFullBarang(){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori from db_barang 
        inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori ORDER BY id_barang ASC";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function SisaStok(){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori from db_barang 
        inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori where stok_sisa <= 3 ORDER BY id_barang ASC";
        $row = $this -> db -> query($sql);
        return $row;            
    }

    public function LihatBarang($id){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori from db_barang 
        inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori WHERE id_barang = '$id'";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function EditBarang($id){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori from db_barang 
        inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori WHERE id_barang = '$id'";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function rowBarang(){
        $sql = "SELECT SUM(stok) as jml FROM db_barang";
        $row = $this->db->query($sql);
        return $row;
    }
    
    public function rowRestok(){
        $sql = "SELECT SUM(restok) as jml FROM db_barang";
        $row = $this->db->query($sql);
        return $row;
    }

    public function rowKeungan(){
        $sql = "SELECT SUM(harga_beli*stok) as jual FROM db_barang";
        $row = $this->db->query($sql);
        return $row;
    }

    public function SimpanBarang($id_kategori, $nama, $merk, $beli, $jual, $stok, $satuan, $image, $tanggal){
        $table = "db_barang";
        $dataTable["db_barang"] = array(
            $id_kategori => htmlspecialchars($_POST["kategori"]),
            $nama => htmlspecialchars($_POST["nama"]),
            $merk => htmlspecialchars($_POST["merk"]),
            $beli => htmlspecialchars($_POST["beli"]),
            $jual => htmlspecialchars($_POST["jual"]),
            $stok => htmlspecialchars($_POST["stok"]),
            $satuan => htmlspecialchars($_POST["satuan"]),
            $image => htmlspecialchars($_FILES["image"]["name"]),
            $tanggal => htmlspecialchars($_POST["tanggal_input"])
        );
        $sql = "INSERT INTO $table (id_barang,id_kategori,nama_barang,merk_barang,harga_beli,harga_jual,stok,stok_sisa,restok,satuan_barang,image,tanggal_input) VALUES ('','$id_kategori','$nama','$merk','$beli','$jual','$stok','$stok','0','$satuan','$image','$tanggal')";
        $this->db->query($sql);
    }

    public function EditanBarang($id_kategori, $nama, $merk, $beli, $jual, $stok, $stok_sisa, $satuan, $image, $tanggal, $id){
        $table = "db_barang";
        $dataTable["db_barang"] = array(
            $id => htmlspecialchars($_POST["id_barang"]),
            $id_kategori => htmlspecialchars($_POST["kategori"]),
            $nama => htmlspecialchars($_POST["nama"]),
            $merk => htmlspecialchars($_POST["merk"]),
            $beli => htmlspecialchars($_POST["beli"]),
            $jual => htmlspecialchars($_POST["jual"]),
            $stok => htmlspecialchars($_POST["stok"]),
            $stok_sisa => htmlspecialchars($_POST["sisa"]),
            $satuan => htmlspecialchars($_POST["satuan"]),
            $image => htmlspecialchars($_FILES["image"]["name"]),
            $tanggal => htmlspecialchars($_POST["tanggal_input"])
        );
        $sql = "UPDATE $table SET id_kategori='$id_kategori', nama_barang='$nama', merk_barang='$merk', harga_beli='$beli', harga_jual='$jual', stok='$stok', stok_sisa='$stok_sisa', satuan_barang='$satuan', image='$image', tanggal_input='$tanggal' WHERE id_barang='$id'";
        $this->db->query($sql);
    }

    public function HapusBarang($id){
        $table = "db_barang";
        $dataTable["db_barang"] = array(
            $id => htmlspecialchars($_POST["id_barang"]),
        );
        $sql = "DELETE FROM $table WHERE id_barang='$id'";
        $this->db->query($sql);
    }

    public function RestokBarang($stok, $restok, $id){
        $table = "db_barang";
        $dataTable["db_barang"] = array(
            $stok => htmlspecialchars($_POST["stok"]),
            $restok => htmlspecialchars($_POST["sisa"]),
            $id => htmlspecialchars($_POST["id_barang"])
        );
        $sql_barang = "SELECT * FROM $table WHERE id_barang = '$id'";
        $row_barang = $this->db->query($sql_barang);
        $hsl = $row_barang->fetch_array();
        $total = $hsl["stok_sisa"] - $restok;
        $this->db->query("UPDATE $table SET stok='$hsl[stok]', stok_sisa='$total', restok='$restok' WHERE id_barang='$id'");
    }

    public function BarangCari($cari){
        $sql = "select db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori
        from db_barang inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori
        where id_barang like '%$cari%' or nama_barang like '%$cari%' or merk_barang like '%$cari%'";
        $row = $this->db->query($sql);
        $hasil = $row->fetch_array();
        return $hasil;
    }

    /* Kategori */
    public function LihatFullKategori(){
        $table = "db_kategori";
        $row = $this->db->query("SELECT * FROM $table ORDER BY id_kategori ASC");
        return $row;
    }

    public function SimpanKategori($kategori){
        $table = "db_kategori";
        array($kategori => htmlspecialchars($_POST["kategori"]));
        $sql = "INSERT INTO $table (id_kategori, nama_kategori) VALUEs ('','$kategori')";
        $this->db->query($sql);
    }
    
    public function LihatKategori($id_kategori){
        $table = "db_kategori";
        array($id_kategori => htmlspecialchars($_GET["id_kategori"]));
        $row = $this->db->query("SELECT * FROM $table WHERE id_kategori='$id_kategori'");
        return $row;
    }

    public function EditanKategori($kategori,$id_kategori){
        $table = "db_kategori";
        array($id_kategori => htmlspecialchars($_POST["id"]), $kategori => htmlspecialchars($_POST["kategori"]));
        $row = $this -> db -> query("UPDATE $table SET nama_kategori = '$kategori' WHERE id_kategori='$id_kategori'");
        return $row;
    }

    public function HapusKategori($id){
        $table = "db_kategori";
        $dataTable["db_kategori"] = array(
            $id => htmlspecialchars($_POST["id_kategori"]),
        );
        $sql = "DELETE FROM $table WHERE id_kategori='$id'";
        $this->db->query($sql);
    }

    public function rowKategori(){
        $sql = "SELECT count(id_kategori) as jml FROM db_kategori";
        $row = $this->db->query($sql);
        return $row;
    }

    /* Penjualan */
    public function penjualan(){
        $sql = "SELECT db_penjualan.* , db_barang.id_barang, db_barang.nama_barang, db_barang.harga_jual from db_penjualan 
        left join db_barang on db_barang.id_barang = db_penjualan.id_barang ORDER BY id";
        $row = $this->db->prepare($sql);
        $row -> execute();
        $hasil = $row -> fetchAll();
        return $hasil;
    } 

    public function jual(){
        $date = array(date("m-Y"));
        $sql = "SELECT db_nota_backup.* , db_barang.id_barang, db_barang.nama_barang, db_barang.harga_beli, db_barang.harga_jual from db_nota_backup 
        left join db_barang on db_barang.id_barang = db_nota_backup.id_barang where db_nota_backup.periode = '$date' ORDER BY id ASC";
        $row = $this->db->query($sql);
        $hasil = $row->fetch_array();
        return $hasil;
    }

    public function periode_jual($periode){
        $sql = "SELECT db_nota_backup.* , db_barang.id_barang, db_barang.nama_barang, db_barang.harga_beli, db_barang.harga_jual from db_nota_backup 
        left join db_barang on db_barang.id_barang = db_nota_backup.id_barang where db_nota_backup.periode = '$periode' ORDER BY id ASC";
        $row = $this->db->query($sql);
        return $row;
    }

    public function hari_jual($hari){
        $ex = explode('-', $hari);
        $monthNum  = $ex[1];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        if ($ex[2] > 9) {
            $tgl = $ex[2];
        } else {
            $tgl1 = explode('0', $ex[2]);
            $tgl = $tgl1[1];
        }
        $cek = $tgl.' '.$monthName.' '.$ex[0];
        $param = "%{$cek}%";
        $sql = "SELECT db_nota_backup.* , db_barang.id_barang, db_barang.nama_barang, db_barang.harga_beli, db_barang.harga_jual from db_nota_backup 
        left join db_barang on db_barang.id_barang=db_nota_backup.id_barang WHERE db_nota_backup.tanggal_input LIKE ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute(array($param));
        $hasil = $row->fetch();
        return $hasil;
    }

    /* Total Belanja */
    public function jumlah(){
        $sql = "SELECT SUM(total) as bayar FROM db_penjualan";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil = $row->fetch();
        return $hasil;
    } 

    public function jumlah_nota(){
        $sql = "SELECT SUM(total) as bayar FROM db_nota";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    /* Tambah Keranjan */
    public function keranjang(){
        $id = $_GET['id'];
        $sqbarang = "SELECT * FROM db_barang WHERE id_barang = ?";
        $rwbarang = $this->db->prepare($sqbarang);
        $rwbarang->execute(array($id));
        $row = $rwbarang->fetch();

        if($row['restok'] > 0){
            $jumlah = 1;
            $harga = $row['harga_jual'];
            $total = $row['harga_jual'] * $jumlah;
            $tgl = date("j F Y, G:i");

            $table = "db_penjualan";
            $this -> db -> query("INSERT INTO $table (id,id_barang,harga_jual,jumlah,total,tanggal_input) VALUES ('','$id','$harga','$jumlah','$total,','$tgl')");
            $this -> db -> query("INSERT INTO db_penjualan_backup (id,id_barang,harga_jual,jumlah,total,tanggal_input) VALUES ('','$id','$harga','$jumlah','$total,','$tgl')");
            header("location:../ui/header.php?page=jual&nota=yes");        
        }else{
            echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
            header("location:../ui/header.php?page=jual#keranjang");
        }
    }
    
}
?>