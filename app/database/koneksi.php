<?php 
namespace koneksi;

error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
$conn = mysqli_connect("localhost", "root", "") or die("Connection database : ".mysqli_connect_errno());
mysqli_select_db($conn, "bengkeldb_2");

$view = "../model/view.php";
$controller = "../controller/controllerView.php";
?>