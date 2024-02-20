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
        left join db_barang on db_barang.id_barang = db_nota_backup.id_barang where db_nota_backup.periode = ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute($date);
        $hasil = $row->fetch();
        return $hasil;
    }

    public function periode_jual($periode){
        $sql = "SELECT db_nota_backup.* , db_barang.id_barang, db_barang.nama_barang, db_barang.harga_beli, db_barang.harga_jual from db_nota_backup 
        left join db_barang on db_barang.id_barang = db_nota_backup.id_barang where db_nota_backup.periode = ? ORDER BY id ASC";
        $row = $this->db->prepare($sql);
        $row->execute(array($periode));
        $hasil = $row->fetch();
        return $hasil;
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

    public function total_nota(){
        $sql = "SELECT SUM(total) as total FROM db_nota_backup";
        $row = $this -> db -> prepare($sql);
        $row -> execute();
        $hasil = $row->fetch();
        return $hasil;
    }

    /* Tambah Keranjan */
    public function keranjang(){
        $id = $_GET['id'];
        $sqbarang = "SELECT * FROM db_barang WHERE id_barang = '$id'";
        $rwbarang = $this->db->query($sqbarang);
        $row = $rwbarang->fetch_array();

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

    public function EditKeranjang(){
        $table = "db_barang";
        $id = htmlentities($_POST['id']);
        $id_barang = htmlentities($_POST['id_barang']);
        $jumlah = htmlentities($_POST['jumlah']);
        /* Pengeditan data barang */
        $sqbarang = "SELECT * FROM $table WHERE id_barang = ?";
        $rwbarang = $this->db->prepare($sqbarang);
        $rwbarang->execute(array($id_barang));
        $hasil = $rwbarang->fetch();

        if($hasil['restok'] > $jumlah){
            $jual = $hasil['harga_jual'];
            $total = $jual * $jumlah;
            $data[] = $id;
            $data[] = $jumlah;
            $data[] = $total;
            
            $sqUpdate = "UPDATE db_penjualan SET jumlah=?, total=? WHERE id=?";
            $rwUpdate = $this->db->prepare($sqUpdate);
            $rwUpdate->execute($data);
            header("location:../ui/header.php?page=jual&nota=yes");
        }else{
            echo '<script>alert("Stok Barang Anda Telah Habis !");"</script>';
            header("location:../ui/header.php?page=jual#keranjang");
        }
    }

    public function HapusResetKeranjang(){
        $sqKeranjang = "DELETE FROM db_penjualan";
        $rwKeranjang = $this->db->query($sqKeranjang);
        header("location:../ui/header.php?page=jual");
        return $rwKeranjang;
    }
    
    public function HapusBelanjaan(){
        $sqBelanja = "DELETE FROM db_nota";
        $rwBelanja = $this->db->query($sqBelanja);
        header("location:../ui/header.php?page=jual");
        return $rwBelanja;
    }

    public function HapusItemKeranjang(){
        $brg = $_GET['brg'];
        $id = $_GET['id'];
        $sqBarang = "SELECT * from db_barang where id_barang = ?";
        $rwBarang = $this->db->prepapre($sqBarang);
        $rwBarang->execute(array($brg));

        $sqPenjualan = "DELETE FROM db_penjualan WHERE id = ?";
        $rwPenjualan = $this->db->prepare($sqPenjualan);
        $rwPenjualan->execute(array($id));
        header("location:../ui/header.php?page=jual");
    }

    /* Reservasi */
    public function merkKendaraan(){
        $table = "db_kendaraan";
        $row = $this->db->query("SELECT * FROM $table ORDER BY id ASC");
        return $row;  
    }

    public function ReservasiTambah(){
        $emailpengguna = htmlspecialchars($_POST['email']);
        $platnomer = htmlspecialchars($_POST['plat_kendaraan']);
        $merkendaraan = htmlspecialchars($_POST['merk_kendaraan']);
        $tanggal = htmlspecialchars($_POST['tanggal_input']);
        $waktu = htmlspecialchars($_POST['waktu_input']);

        $rowPengguna = "SELECT * FROM db_account WHERE email='$emailpengguna' order by id asc";
        $tablePengguna = $this->db->query($rowPengguna);
        $rwPengguna = $tablePengguna->fetch_assoc();
        $_SESSION['pengguna'] = $rwPengguna['email'];

        /* Data ditambahkan */
        $table = "db_reservasi";
        $sqReservasi = "INSERT INTO $table (id,email,plat_kendaraan,merk_kendaraan,tanggal_input,waktu_input) VALUES ('','$_SESSION[pengguna]','$platnomer','$merkendaraan','$tanggal','$waktu')";
        $this->db->query($sqReservasi);
        header("location:../ui/header.php?page=reservasi&email=".$_SESSION['pengguna']);
    }

    public function reservasi($email){
        $table = "db_reservasi";
        $email = $_SESSION['email_pengguna'];
        $rowTable = "SELECT * FROM $table WHERE email = '$email' order by id ASC";
        $hasil = $this->db->query($rowTable);
        return $hasil;
    }

    public function ReservasiEdit(){
        $id = htmlspecialchars($_POST['id']);
        $emailpengguna = htmlspecialchars($_POST['email']);
        $platnomer = htmlspecialchars($_POST['plat_kendaraan']);
        $merkendaraan = htmlspecialchars($_POST['merk_kendaraan']);
        $tanggal = htmlspecialchars($_POST['tanggal_input']);
        $waktu = htmlspecialchars($_POST['waktu_input']);

        $rowPengguna = "SELECT * FROM db_account WHERE email='$emailpengguna' order by id asc";
        $tablePengguna = $this->db->query($rowPengguna);
        $rwPengguna = $tablePengguna->fetch_assoc();
        $_SESSION['pengguna'] = $rwPengguna['email'];

        /* Data ditambahkan */
        $table = "db_reservasi";
        $sqReservasi = "UPDATE $table SET email='$_SESSION[pengguna]', plat_kendaraan='$platnomer', merk_kendaraan='$merkendaraan', tanggal_input='$tanggal', waktu_input='$waktu' WHERE id='$id'";
        $this->db->query($sqReservasi);
        header("location:../ui/header.php?page=reservasi&email=".$_SESSION['pengguna']);
    }

    public function Lihatreservasi($id){
        $table = "db_reservasi";
        $id = htmlspecialchars($_GET['edit']);
        $rowTable = "SELECT * FROM $table WHERE id='$id'";
        $hasil = $this->db->query($rowTable);
        return $hasil;
    }

}
?>