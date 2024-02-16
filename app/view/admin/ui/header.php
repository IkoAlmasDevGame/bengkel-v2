<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    use controller\controller;
    use model\view;

    session_start();
    require_once("../../../config/auth.php");
    require_once("../../../config/config.php");
    require_once("../../../database/koneksi.php");
    require_once("../../../model/view.php");
    require_once("../../../controller/controllerView.php");

    $model = new View($conn);
    $models = new View($configs);
    $lihat = new Controller($conn);

    if(isset($_GET['aksi'])){
        $aksi = $_GET['aksi'];
        if($aksi == "keluar"){
            if(isset($_SESSION['status'])){
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../index.php");
            exit(0);
        }
    }

    if(!isset($_GET["act"])){
    }else{
        switch ($_GET["act"]) {
            // Barang
            case 'simpan-barang':
                $lihat->BarangSimpan();
                header("location:header.php?page=barang");
                break;
            case 'edit-barang':
                $lihat->BarangEditan();
                header("location:header.php?page=barang");
                break;
            case 'restok-barang':
                $lihat->restok();
                header("location:header.php?page=barang");
                break;
            case 'hapus-barang':
                $lihat->BarangHapus();
                header("location:header.php?page=barang");
                break;

            // Kategori
            case 'simpan-kategori':
                $lihat->KategoriSimpan();
                header("location:header.php?page=kategori");
                break;
            case 'edit-kategori':
                $lihat->KategoriEditan();
                header("location:header.php?page=kategori");
                break;
            case 'hapus-kategori':
                $lihat->KategoriHapus();
                header("location:header.php?page=kategori");
                break;
            /* Tambah Keranjang */
            case 'tambah-keranjang':
                $model->keranjang();
                header("location:header.php?page=jual&nota=yes");
                break;

            default:
                header("location:../dashboard/index.php");
                break;
        }
    }

    if(!isset($_GET["page"])){
    }else{
        switch ($_GET["page"]) {
            case 'barang':
                require_once("../barang/index.php");
                break;
                
            case 'kategori':
                require_once("../kategori/index.php");
                break;
                
            case 'jual':
                require_once("../jual/index.php");
                break;
                
            case 'print':
                require_once("../jual/print.php");
                break;
            
            default:
            require_once("../dashboard/index.php");
                break;
        }
    }

    ?>
    <meta charset="UTF-8">
    <meta content='text/html; charset=iso-8859-1' http-equiv='Content-type' />
    <meta content='width=330, height=400, initial-scale=1' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>Dashboard Sahabat Bengkel Motor</title>
    <!--  -->
    <link rel="shortcut icon" href="../../../../assets/icon/Logo SMB.png" type="image/x-icon">
    <!--  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../../../dist/css/glyphicon.css">

    <style type="text/css">
    .fa-gear {
        animation: gears 3s linear infinite;
    }

    @keyframes gears {
        100% {
            transform: rotate(360deg);
        }
    }
    </style>
</head>

<body>
    <div class="app">
        <div class="layout">

        </div>
    </div>