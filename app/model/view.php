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
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori
        from db_barang inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori 
        ORDER BY id_barang ASC";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function SisaStok(){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori
        from db_barang inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori  
        where stok_sisa <= 3 ORDER BY id_barang ASC";
        $row = $this -> db -> query($sql);
        return $row;            
    }

    public function LihatBarang($id){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori
        from db_barang inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori 
        WHERE id_barang = '$id'";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function EditBarang($id){
        $sql = "SELECT db_barang.*, db_kategori.id_kategori, db_kategori.nama_kategori
        from db_barang inner join db_kategori on db_barang.id_kategori = db_kategori.id_kategori 
        WHERE id_barang = '$id'";
        $row = $this -> db -> query($sql);
        return $row;
    }

    public function rowBarang(){
        $sql = "SELECT SUM(stok) as jml FROM db_barang";
        $row = $this->db->query($sql);
        return $row;
    }

    public function rowKeungan(){
        $sql = "SELECT SUM(harga_jual*stok) as jual FROM db_barang";
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
        $sql = "INSERT INTO $table (id_barang,id_kategori,nama_barang,merk_barang,harga_beli,harga_jual,stok,stok_sisa,satuan_barang,image,tanggal_input) VALUES ('','$id_kategori','$nama','$merk','$beli','$jual','$stok','$stok','$satuan','$image','$tanggal')";
        $this->db->query($sql);
    }

    public function EditanBarang($id, $id_kategori, $nama, $merk, $beli, $jual, $stok, $stok_sisa, $satuan, $image, $tanggal){
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

    public function RestokBarang($id, $restok, $stok){
        $table = "db_barang";
        $dataTable["db_barang"] = array(
            $id => htmlspecialchars($_POST["id_barang"]),
            $restok => htmlspecialchars($_POST["restok"]),
            $stok => htmlspecialchars($_POST["stok"])
        );
        $sql_barang = "SELECT * FROM $table WHERE id_barang = '$id'";
        $row_barang = $this->db->query($sql_barang);
        $hsl = $row_barang->fetch_array();
        $total = $hsl["stok"] - $restok;
        $sisa = $hsl["stok"];
        $this->db->query("UPDATE $table SET stok='$sisa', stok_sisa='$total' WHERE id_barang='$id'");
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

    public function EditanKategori($id_kategori, $kategori){
        $table = "db_kategori";
        array($id_kategori => htmlspecialchars($_POST["id_kategori"]), $kategori => htmlspecialchars($_POST["kategori"]));
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

}

?>